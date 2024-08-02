const accordionItems = document.querySelectorAll('.n-acc-item');

accordionItems.forEach(item => {
  const header = item.querySelector('.n-acc-item-head');
  const content = item.querySelector('.n-acc-item-body');

  header.addEventListener('click', (event) => {
    // item.classList.add('just-clicked');
    if (item.classList.contains('open')) {
        content.style.height = '0px'; // Collapse animation
        item.classList.remove('open');

        const minusIcon = header.querySelector('.fa-solid.fa-minus');
        
        if (minusIcon) {
            minusIcon.classList.remove('fa-minus'); // Optional: Remove FontAwesome classes
            minusIcon.classList.add('fa-plus'); // Add your negative icon class
        }
    } else {

      closeAllAccordions();

      if(item.classList.contains('n-acc-stay-open')) {
        item.classList.remove('n-acc-stay-open');
        content.style.height = '0px'; // Collapse animation
        item.classList.remove('open');

        const minusIcon = header.querySelector('.fa-solid.fa-minus');
        
        if (minusIcon) {
            minusIcon.classList.remove('fa-minus'); // Optional: Remove FontAwesome classes
            minusIcon.classList.add('fa-plus'); // Add your negative icon class
        }
      } else {

        const contentHeight = content.scrollHeight + 'px'; // Get actual height
        content.style.height = contentHeight; // Set dynamic height
        item.classList.add('open');

        const plusIcon = header.querySelector('.fa-solid.fa-plus');

        if (plusIcon) {
            plusIcon.classList.remove('fa-plus'); // Optional: Remove FontAwesome classes
            plusIcon.classList.add('fa-minus'); // Add your negative icon class
        }
      }
    }
  });
});

function closeAllAccordions() {
  accordionItems.forEach(item => {
    const header = item.querySelector('.n-acc-item-head');
    const content = item.querySelector('.n-acc-item-body');


    if (item.classList.contains('open')) {
        content.style.height = '0px'; // Collapse animation
        item.classList.remove('open');

        const minusIcon = header.querySelector('.fa-solid.fa-minus');
        
        if (minusIcon) {
            minusIcon.classList.remove('fa-minus'); // Optional: Remove FontAwesome classes
            minusIcon.classList.add('fa-plus'); // Add your negative icon class
        }
    }

  });
}

const menuOpeners = document.querySelectorAll(".n-navigation .menu-opener");

for(menuOpener of menuOpeners) {
  menuOpener.addEventListener("click", function(event) {

    let closeClass = this.dataset.close;
    let openClass = this.dataset.open;

    if(this.classList.contains("open-menu")) {
      this.classList.remove("open-menu");
      this.classList.remove(openClass);
      this.classList.add(closeClass);
    } else {
      this.classList.add("open-menu");
      this.classList.add(openClass);
      this.classList.remove(closeClass);
    }
  });
}

function moveElementToBeginning(element, targetParent) {

  console.log(`Move ${element.textContent} To Beginning`);

  if(element) {
    const elementParent = element.parentNode;
    elementParent.removeChild(element);
    targetParent.prepend(element);

    console.log(targetParent.children);
  } else {
    console.log("Null Element To Beginning");
  }
}

function moveElementToEnd(element, targetParent) {

  console.log(`Moved ${element.textContent} To End`);

  if(element) {
    const elementParent = element.parentNode; 
    elementParent.removeChild(element);
    targetParent.append(element);
  } else {
    console.log("Null Element To End");
  }

}

function calculateTotalWidth(elements) {
  let totalWidth = 0;
  for (const item of elements) {
    const itemWidth = item.getBoundingClientRect().width;
    totalWidth += itemWidth;
  }

  return totalWidth;
}

function adjustingMenu(menu_id) {
  const menu = document.querySelector(`#${menu_id}.shrinker`);
  const navItems = document.querySelectorAll(`#${menu_id} .nav-brand, #${menu_id}.shrinker > ol, #${menu_id} .menu-opener`);
  const availableWidth = menu.parentElement.clientWidth;

  const menuOpenerMenu = document.querySelector(`#${menu_id} .n-navlink-group ol`);

  let totalWidth = calculateTotalWidth(navItems);

  let maxIterations = 10; // Set a limit for maximum iterations
  let iterationCount = 0;

  let element = document.querySelector(`#${menu_id}.shrinker > ol > li:last-child`);
  let targetParent = document.querySelector(`#${menu_id} .n-navlink-group ol`);

  while((totalWidth + 300) > availableWidth && element && iterationCount < maxIterations) {

    element = document.querySelector(`#${menu_id}.shrinker > ol > li:last-child`);
    targetParent = document.querySelector(`#${menu_id} .n-navlink-group ol`);

    moveElementToBeginning(element, targetParent);
    totalWidth = calculateTotalWidth(navItems);

    iterationCount++;
  }

  element = document.querySelector(`#${menu_id} .n-navlink-group ol > li:first-child`);
  targetParent = document.querySelector(`#${menu_id}.shrinker > ol`);
  iterationCount = 0;

  while((totalWidth + 300) < availableWidth && element && iterationCount < maxIterations) {

    moveElementToEnd(element, targetParent);
    totalWidth = calculateTotalWidth(navItems);

    iterationCount++;

  }

  if(menuOpenerMenu.querySelectorAll("li").length > 0) {
    menuOpenerMenu.classList.add("has-nav-items");
    document.querySelector(`nav#${menu_id} ol`)
    document.querySelector(`nav#${menu_id} i.menu-opener`).classList.add("visible");
  } else {
    document.querySelector(`nav#${menu_id} i.menu-opener`).classList.remove("visible");
    menuOpenerMenu.classList.remove("has-nav-items");
  }

}

// window.addEventListener("resize", () => adjustingMenu('shrinker-menu'));
// adjustingMenu('shrinker-menu');

// window.addEventListener("resize", () => adjustingMenu('shrinker-menu-a'));
// adjustingMenu('shrinker-menu-a');

let closeElems = document.querySelectorAll(".n-closer");

for(closeElem of closeElems) {
  closeElem.addEventListener("click", function(event) {

    let targetElemId = this.dataset.nuTarget;

    let targetElem = document.getElementById(targetElemId);

    hideElement(targetElem);
  });
}

function removeClasses(elementObject, classesString) {

  const classes = classesString.split(' ');

  for (const class_name of classes) {
    console.log(`removeClasses was called to remove ${class_name}!`);
    elementObject.classList.remove(class_name);
  }

  return elementObject;
}

function addClasses(elementObject, classesString) {

  const classes = classesString.split(' ');

  for (const class_name of classes) {
    elementObject.classList.add(class_name);
  }

  return elementObject;
}

let openElems = document.querySelectorAll(".n-opener");

for(openElem of openElems) {
  openElem.addEventListener("click", function(event) {

    let targetElemId = this.dataset.nuTarget;

    let targetElem = document.getElementById(targetElemId);

    showElement(targetElem);
  });
}

let tabBtnElems = document.querySelectorAll(".n-tabs .n-btn");

for(tabBtnElem of tabBtnElems) {
  tabBtnElem.addEventListener("click", function(event) {

    let tabBtnParent = this.parentElement.parentElement;
    tabBtnParent.querySelector('.active').classList.remove('active');
    this.parentElement.classList.add('active');

    let targetElemId = this.dataset.nuTarget;
    let targetElem = document.getElementById(targetElemId);
    let currentPaneParent = targetElem.parentElement;
    currentPaneParent.querySelector('.active').classList.remove('active');

    targetElem.classList.add('active');
  });
}

let pillBtnElems = document.querySelectorAll(".n-pills .n-btn");

for(pillBtnElem of pillBtnElems) {
  pillBtnElem.addEventListener("click", function(event) {

    let pillBtnParent = this.parentElement.parentElement;
    let pillBtnClassesToApply = pillBtnParent.dataset.nuTabClasses;

    console.log(pillBtnClassesToApply);

    removeClasses(pillBtnParent.querySelector('.active .n-btn'), pillBtnClassesToApply);
    pillBtnParent.querySelector('.active').classList.remove('active');
    this.parentElement.classList.add('active');
    
    addClasses(pillBtnParent.querySelector('.active .n-btn'), pillBtnClassesToApply);

    let targetElemId = this.dataset.nuTarget;
    let targetElem = document.getElementById(targetElemId);
    let currentPaneParent = targetElem.parentElement;
    currentPaneParent.querySelector('.active').classList.remove('active');

    targetElem.classList.add('active');
  });
}


function hideElement(targetElem) {
  targetElem.classList.remove('fade-in');
  targetElem.classList.add('fade-out');

  targetElem.addEventListener('transitionend', () => {
    if(targetElem.classList.contains('fade-out')) {
      targetElem.classList.add('hide');
    }
  });
}

function showElement(targetElem) {
  targetElem.classList.add('fade-in');
  targetElem.classList.remove('hide');

  setTimeout(function() {
    targetElem.classList.remove('fade-out');
  }, 100);
}