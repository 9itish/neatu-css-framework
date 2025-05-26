// Utility functions
function toggleIcon(el, removeClass, addClass) {
  if (el) {
    el.classList.remove(removeClass);
    el.classList.add(addClass);
  }
}

function collapseItem(item) {
  const content = item.querySelector('.ntu-acc-item-body');
  const icon = item.querySelector('.fa-minus');
  content.style.height = '0px';
  item.classList.remove('open');
  toggleIcon(icon, 'fa-minus', 'fa-plus');
}

function expandItem(item) {
  const content = item.querySelector('.ntu-acc-item-body');
  const icon = item.querySelector('.fa-plus');
  content.style.height = content.scrollHeight + 'px';
  item.classList.add('open');
  toggleIcon(icon, 'fa-plus', 'fa-minus');
}

function closeAllAccordions() {
  accordionItems.forEach(item => {
    if (item.classList.contains('open')) collapseItem(item);
  });
}

const accordionItems = document.querySelectorAll('.ntu-acc-item');
accordionItems.forEach(item => {
  const header = item.querySelector('.ntu-acc-item-head');
  header.addEventListener('click', () => {
    if (item.classList.contains('open')) {
      collapseItem(item);
    } else {
      closeAllAccordions();
      if (item.classList.contains('ntu-acc-stay-open')) {
        item.classList.remove('ntu-acc-stay-open');
        collapseItem(item);
      } else {
        expandItem(item);
      }
    }
  });
});

const menuOpeners = document.querySelectorAll(".ntu-nav .ntu-nav-opener");
for (const menuOpener of menuOpeners) {
  menuOpener.addEventListener("click", function () {
    const closeClass = this.dataset.close;
    const openClass = this.dataset.open;
    this.classList.toggle("ntu-nav-open");
    this.classList.toggle(openClass);
    this.classList.toggle(closeClass);
  });
}

function moveElementToBeginning(element, targetParent) {
  if (element) {
    element.parentNode.removeChild(element);
    targetParent.prepend(element);
  }
}

function moveElementToEnd(element, targetParent) {
  if (element) {
    element.parentNode.removeChild(element);
    targetParent.append(element);
  }
}

function calculateTotalWidth(elements) {
  let totalWidth = 0;
  for (const item of elements) {
    totalWidth += item.getBoundingClientRect().width;
  }
  return totalWidth;
}

function adjustingMenu(menu_id) {
  const menu = document.querySelector(`#${menu_id}.ntu-nav-shrink`);
  const navItems = document.querySelectorAll(`#${menu_id} .nav-brand, #${menu_id}.ntu-nav-shrink > ul, #${menu_id} .ntu-nav-opener`);
  const availableWidth = menu.parentElement.clientWidth;
  const overflowList = document.querySelector(`#${menu_id} .ntu-nav-grp ul`);
  let totalWidth = calculateTotalWidth(navItems);
  let iterationCount = 0;

  while ((totalWidth + 300) > availableWidth && iterationCount < 10) {
    const item = document.querySelector(`#${menu_id}.ntu-nav-shrink > ul > li:last-child`);
    moveElementToBeginning(item, overflowList);
    totalWidth = calculateTotalWidth(navItems);
    iterationCount++;
  }

  iterationCount = 0;
  while ((totalWidth + 300) < availableWidth && iterationCount < 10) {
    const item = overflowList.querySelector('li:first-child');
    moveElementToEnd(item, document.querySelector(`#${menu_id}.ntu-nav-shrink > ul`));
    totalWidth = calculateTotalWidth(navItems);
    iterationCount++;
  }

  const opener = document.querySelector(`nav#${menu_id} i.ntu-nav-opener`);
  if (overflowList.querySelectorAll("li").length > 0) {
    overflowList.classList.add("has-nav-items");
    opener.classList.add("visible");
  } else {
    opener.classList.remove("visible");
    overflowList.classList.remove("has-nav-items");
  }
}

function hideElement(targetElem) {
  targetElem.classList.remove('fade-in');
  targetElem.classList.add('fade-out');
  targetElem.addEventListener('transitionend', () => {
    if (targetElem.classList.contains('fade-out')) {
      targetElem.classList.add('hide');
    }
  });
}

function showElement(targetElem) {
  targetElem.classList.add('fade-in');
  targetElem.classList.remove('hide');
  setTimeout(() => targetElem.classList.remove('fade-out'), 100);
}

function removeClasses(el, classes) {
  classes.split(' ').forEach(c => el.classList.remove(c));
  return el;
}

function addClasses(el, classes) {
  classes.split(' ').forEach(c => el.classList.add(c));
  return el;
}

document.querySelectorAll(".ntu-closer").forEach(closeElem => {
  closeElem.addEventListener("click", function () {
    hideElement(document.getElementById(this.dataset.ntuTarget));
  });
});

document.querySelectorAll("[data-ntu-child-classes]").forEach(parent => {
  const classes = parent.getAttribute('data-ntu-child-classes');
  [...parent.children].forEach(child => addClasses(child, classes));
});

document.querySelectorAll(".ntu-opener").forEach(openElem => {
  openElem.addEventListener("click", function () {
    showElement(document.getElementById(this.dataset.ntuTarget));
  });
});

document.querySelectorAll(".ntu-tabs .ntu-btn").forEach(tabBtn => {
  tabBtn.addEventListener("click", function () {
    const tabContainer = this.closest('.ntu-tabs');
    tabContainer.querySelector('.active').classList.remove('active');
    this.parentElement.classList.add('active');

    const target = document.getElementById(this.dataset.ntuTarget);
    target.parentElement.querySelector('.active').classList.remove('active');
    target.classList.add('active');
  });
});

document.querySelectorAll(".ntu-pills .ntu-btn").forEach(pillBtn => {
  pillBtn.addEventListener("click", function () {
    const parent = this.closest('.ntu-pills');
    const classes = parent.dataset.ntuTabClasses;

    removeClasses(parent.querySelector('.active .ntu-btn'), classes);
    parent.querySelector('.active').classList.remove('active');
    this.parentElement.classList.add('active');
    addClasses(this, classes);

    const target = document.getElementById(this.dataset.ntuTarget);
    target.parentElement.querySelector('.active').classList.remove('active');
    target.classList.add('active');
  });
});
