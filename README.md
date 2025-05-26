# NeatU CSS Framework

![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)
![Minified Size](https://img.shields.io/badge/gzipped-~5.7KB-blue)
![Built with Sass](https://img.shields.io/badge/built%20with-Sass-cc6699)

**NeatU** is a lightweight, utility-first CSS framework built for speed, clarity, and control. It’s a no-BS alternative to bloated CSS libraries — gzipped under **6KB**, yet packed with everything you actually need.

> ⚡ Built to help you move fast without fighting your CSS.

I’m continuously refining it, and I’m open to feedback, ideas, or pull requests.

## Features

- Utility-first classes (`ntu-flex`, `ntu-pad-tb`, `ntu-tcl-error`, etc.)
- Fully functional important components like accordions, navigation, and tabs.
- Clean, semantic class naming (`ntu-` prefix to avoid conflicts)
- Generated from SCSS to keep it modular and easily customizable.
- Responsive and minimal — no junk

## 📦 File Structure

```
css/
├── neatu.css           # Compiled main CSS
├── neatu.min.css       # Minified CSS
├── ... more files    # More files
scss/
├── _accordion.scss   # Accordion Partials
├── _buttons.scss     # Button Partials
├── _flexbox.scss     # Flexbox based layout (Grid coming soon!)
├── _variables.scss   # Colors, breakpoints, etc.
├── neatu.scss        # Main SCSS import
js/
├── neatu.js          # All framework functionality
...
```

## 🧱 Basic Usage

### Include in HTML

```html
<link rel="stylesheet" href="css/neatu.min.css" />
<script src="js/neatu.js"></script>
```

### Example: Flexbox

```html
<div class="ntu-flex ntu-flex-eq-mw">
  <div>Item 1</div>
  <div>Item 2</div>
</div>
```

### Example: Accordion

```html
<div class="ntu-acc-item">
  <div class="ntu-acc-item-head">Click me</div>
  <div class="ntu-acc-item-body">Hidden content</div>
</div>
```

## 🎨 Customization

Edit `scss/_variables.scss` to tweak:

```scss
$colors: (
  'success': #4CAF50,
  'error': #E53935,
  'warning': #F57C00,
  'normal': #2196F3,
  'text': #222222,
  'border': #AAAAAA,
  'brand-primary': #00796B,
  'brand-secondary': #0C3671
);
```

Run SCSS build:

```bash
npm run sass:build
```

## Philosophy

- Don’t ship what you won’t use
- Prefix everything to avoid namespace pollution
- Give devs control, not assumptions
- Optimize for small size + mental load

## 📉 Size

| File            | Size    |
|-----------------|---------|
| `neatu.css`     | ~42 KB  |
| `ntu.min.css`   | ~34 KB  |
| Gzipped         | **~5.73 KB** |

## 🛠 Browser Support

- ✅ Chrome
- ✅ Firefox
- ✅ Edge
- ✅ Safari
- IE (Let it die)

## Roadmap

1. Support for grid based layout.
2. More theming options and config overrides.
3. Improved accessibility.

## 📃 License

MIT — use it, modify it, make it your own.