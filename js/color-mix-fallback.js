(function () {
  function supportsColorMix() {
    return CSS.supports('background', 'color-mix(in srgb, black 10%, white)');
  }

  function hexToRgb(hex) {
    let c = hex.trim();
    if (c[0] === '#') c = c.slice(1);
    if (c.length === 3) {
      c = c.split('').map(ch => ch + ch).join('');
    }
    const bigint = parseInt(c, 16);
    return [(bigint >> 16) & 255, (bigint >> 8) & 255, bigint & 255];
  }

  function mixColors(fgColor, bgColor, fgPercent) {
    const p = fgPercent;
    const mixed = fgColor.map((c, i) => Math.round(c * p + bgColor[i] * (1 - p)));
    return `rgb(${mixed.join(',')})`;
  }

  function applyFallback(el) {
    const attr = el.getAttribute('data-ntu-bg-cm');
    if (!attr) return;

    const [bgHex, percentStr] = attr.split(',');
    const mixPercent = parseFloat(percentStr) || 0.1;

    const style = getComputedStyle(el);
    const fgColorRgbStr = style.color;
    const fgColor = fgColorRgbStr.match(/\d+/g).map(Number);
    const bgColor = hexToRgb(bgHex);
    const fallbackBg = mixColors(fgColor, bgColor, mixPercent);

    el.style.backgroundColor = fallbackBg;
  }

  function applyFallbacks() {
    if (supportsColorMix()) return;

    document.querySelectorAll('[data-ntu-bg-cm]').forEach(applyFallback);
  }

  function setupObserver() {
    if (supportsColorMix()) return;

    let scheduled = false;

    const observer = new MutationObserver(() => {
      if (scheduled) return;
      scheduled = true;
      setTimeout(() => {
        scheduled = false;
        document.querySelectorAll('[data-ntu-bg-cm]').forEach(applyFallback);
      }, 100);
    });

    observer.observe(document.body, { childList: true, subtree: true });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
      applyFallbacks();
      setupObserver();
    });
  } else {
    applyFallbacks();
    setupObserver();
  }

  window.colorMixFallback = applyFallbacks;
})();
