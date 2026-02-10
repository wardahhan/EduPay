# 🚀 Quick Reference - EduPay Responsive Tips

## Responsive Classes Reference

### Common Responsive Patterns

```html
<!-- Heading Responsive -->
<h1 class="text-xl md:text-2xl lg:text-3xl">Title</h1>

<!-- Padding Responsive (most used) -->
<div class="px-3 md:px-4 lg:px-6 py-6 md:py-10">Content</div>

<!-- Grid Responsive (popular patterns) -->
<!-- 1 column → 2 columns → 4 columns -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">

<!-- Flex Direction Responsive -->
<div class="flex flex-col sm:flex-row gap-3 sm:gap-4">

<!-- Spacing Responsive -->
<div class="mb-4 md:mb-6 lg:mb-8">
```

## Most Used Tailwind Classes in EduPay

| Purpose | Class | Mobile | Tablet | Desktop |
|---------|-------|--------|--------|---------|
| **Container** | `max-w-6xl mx-auto` | Same width | Same width | Same width |
| **Padding-X** | `px-3 md:px-4 lg:px-6` | 12px | 16px | 24px |
| **Padding-Y** | `py-6 md:py-10` | 24px | - | 40px |
| **Text Size H1** | `text-xl md:text-2xl` | 20px | - | 24px |
| **Text Size H2** | `text-lg md:text-xl` | 18px | - | 20px |
| **Text Size Body** | `text-xs md:text-sm` | 12px | - | 14px |
| **Input Padding** | `px-3 md:px-4 py-2.5` | 12px | - | 16px |
| **Gap Cards** | `gap-4 md:gap-6` | 16px | - | 24px |
| **Grid 4-col** | `grid-cols-1 sm:grid-cols-2 lg:grid-cols-4` | 1-col | 2-col | 4-col |
| **Grid 3-col** | `grid-cols-1 sm:grid-cols-2 lg:grid-cols-3` | 1-col | 2-col | 3-col |

## Breakpoints

```
sm:  640px  ← Hamburger menu closes, sidebar visible starts
md:  768px  ← Tablet layout
lg:  1024px ← Desktop layout
xl:  1280px ← Large desktop
2xl: 1536px ← Very large screens
```

## File Structure - Responsive Files

```
resources/
├── css/
│   ├── app.css           (Tailwind imports)
│   └── responsive.css    ✨ NEW - Custom mobile-first CSS
├── views/
│   ├── layouts/
│   │   ├── admin.blade.php         ✅ RESPONSIVE
│   │   ├── petugas.blade.php       ✅ RESPONSIVE
│   │   └── siswa.blade.php         ✅ RESPONSIVE
│   ├── admin/
│   │   ├── *-index-dashboard.blade.php    ✅ RESPONSIVE (4 files)
│   │   └── *-create-dashboard.blade.php   ✅ RESPONSIVE (2 files)
│   ├── petugas/
│   │   ├── pembayaran.blade.php            ✅ RESPONSIVE
│   │   ├── history-pembayaran.blade.php    ✅ RESPONSIVE
│   │   ├── pembayaran-show.blade.php       ✅ RESPONSIVE
│   │   └── cetak-bukti.blade.php           ✅ RESPONSIVE
│   ├── siswa/
│   │   ├── riwayat-pembayaran.blade.php    ✅ RESPONSIVE
│   │   └── profile.blade.php               ✅ RESPONSIVE
│   └── dashboard/
│       ├── admin-dashboard.blade.php       ✅ RESPONSIVE
│       ├── petugas-dashboard.blade.php     ✅ RESPONSIVE
│       └── siswa-dashboard.blade.php       ✅ RESPONSIVE
```

## Quick Fixes for Responsive Issues

### Issue: Text Too Small on Mobile
```html
<!-- ❌ BEFORE -->
<h1 class="text-2xl">Title</h1>

<!-- ✅ AFTER -->
<h1 class="text-xl md:text-2xl">Title</h1>
```

### Issue: Hamburger Menu Not Showing on Mobile
```html
<!-- ✅ Already in layouts -->
<header class="md:hidden fixed top-0...">
  <button onclick="toggleSidebar()">☰</button>
</header>
```

### Issue: Form Fields Too Wide on Mobile
```html
<!-- ❌ BEFORE -->
<input class="px-4 py-2">

<!-- ✅ AFTER -->
<input class="px-3 md:px-4 py-2.5 text-sm md:text-base">
```

### Issue: Buttons Overlapping on Mobile
```html
<!-- ❌ BEFORE -->
<div class="flex gap-3">
  <button>Batal</button>
  <button>Simpan</button>
</div>

<!-- ✅ AFTER -->
<div class="flex flex-col sm:flex-row gap-2 sm:gap-3">
  <button>Batal</button>
  <button>Simpan</button>
</div>
```

### Issue: Table Content Overflowing
```html
<!-- ✅ Already implemented -->
<div class="overflow-x-auto">
  <table class="w-full">...</table>
</div>
```

## Testing in Browser DevTools

### Chrome/Edge/Firefox
1. Press `F12` to open DevTools
2. Press `Ctrl+Shift+M` to enable responsive mode
3. Select device from dropdown:
   - `iPhone SE` (375px) - test mobile
   - `iPad Air` (820px) - test tablet
   - `1920x1080` - test desktop

### Common Device Sizes to Test
```
Mobile:
- iPhone SE: 375x667
- iPhone 11: 414x896
- Galaxy S10: 360x800

Tablet:
- iPad Mini: 768x1024
- iPad Air: 820x1180

Desktop:
- Laptop: 1366x768
- Monitor: 1920x1080
```

## Performance Optimization Tips

### ✅ DO
- Use Tailwind utility classes (already optimized)
- Mobile-first approach (style mobile, use `md:lg:` for larger)
- Prefer `gap` over manual margins
- Use semantic HTML
- Minimize custom CSS

### ❌ DON'T
- Don't use hard-coded pixel sizes
- Don't use `!important` (almost never needed in Tailwind)
- Don't create new CSS without checking Tailwind utilities
- Don't set different content for mobile/desktop using CSS (bad UX)
- Don't forget viewport meta tag

## Adding New Responsive Components

### Template Checklist
```html
<!-- 1. Heading -->
<h2 class="text-lg md:text-xl lg:text-2xl">Component Name</h2>

<!-- 2. Container -->
<div class="px-3 md:px-4 lg:px-6 py-4 md:py-6">

<!-- 3. Grid/Layout -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">

<!-- 4. Content -->
<div class="bg-white rounded-lg p-3 md:p-4">

<!-- 5. Buttons -->
<button class="px-4 md:px-5 py-2 md:py-2.5 text-sm md:text-base">

<!-- Do this for all new components! -->
```

## Common Mobile Patterns

### Mobile Menu Pattern
```html
<!-- Header (mobile only) -->
<header class="md:hidden fixed top-0 inset-x-0 bg-white shadow z-50">
  <button onclick="toggleSidebar()">☰</button>
</header>

<!-- Sidebar (hidden on mobile, visible on desktop) -->
<aside id="sidebar" class="md:translate-x-0 -translate-x-full">
  Nav items...
</aside>

<!-- Overlay (mobile only) -->
<div id="overlay" class="hidden md:hidden" onclick="toggleSidebar()"></div>

<!-- JavaScript Toggle -->
<script>
function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('-translate-x-full');
    document.getElementById('overlay').classList.toggle('hidden');
}
</script>
```

### Responsive Form Pattern
```html
<form class="space-y-4 md:space-y-6">
  <!-- Single field -->
  <div class="mb-4 md:mb-5">
    <label class="block text-sm font-semibold mb-2">Label</label>
    <input class="w-full px-3 md:px-4 py-2.5 text-sm md:text-base">
  </div>

  <!-- Two field row -->
  <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 md:gap-4">
    <div>...</div>
    <div>...</div>
  </div>

  <!-- Buttons -->
  <div class="flex flex-col sm:flex-row gap-2 sm:gap-3">
    <button>Cancel</button>
    <button>Submit</button>
  </div>
</form>
```

### Responsive Card Grid Pattern
```html
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
  <div class="bg-white p-3 md:p-4 rounded-lg shadow">
    <icon class="w-6 md:w-8" />
    <p class="text-xs md:text-sm">Label</p>
    <p class="text-lg md:text-2xl font-bold">Value</p>
  </div>
  <!-- Repeat card -->
</div>
```

## Common Issues & Solutions

| Issue | Cause | Solution |
|-------|-------|----------|
| Text unreadable on mobile | Font too small | Use `text-sm md:text-base` |
| Buttons crash on mobile | Too much padding | Use `px-3 md:px-4` |
| Table overflows | No horizontal scroll | Wrap with `overflow-x-auto` |
| Menu hidden on desktop | `md:hidden` class | Add `md:block` or `md:flex` |
| Spacing inconsistent | Missing responsive classes | Use `gap-4 md:gap-6` pattern |
| Image stretched | No max-width | Add `max-w-full h-auto` |
| Form too wide | No column control | Add `grid grid-cols-1 md:grid-cols-2` |

## Useful Resources

- [Tailwind CSS Docs](https://tailwindcss.com/docs/)
- [Chrome DevTools Responsive](https://developer.chrome.com/docs/devtools/device-mode/)
- [MDN - Responsive Design](https://developer.mozilla.org/en-US/docs/Learn/CSS/CSS_layout/Responsive_Design)
- [Web.dev - Mobile-First](https://web.dev/mobile-first/)

## Deployment Checklist

Before going live:
- [ ] Test on real mobile device (not just DevTools)
- [ ] Test iOS Safari & Android Chrome
- [ ] Verify hamburger menu works
- [ ] Check form inputs on iOS (shouldn't zoom)
- [ ] Verify table scrolling smooth
- [ ] Test on slow 3G network
- [ ] Run Lighthouse audit
- [ ] Check accessibility
- [ ] Verify print styles (receipts)
- [ ] No console errors in mobile view

---

**Last Updated:** 10 Februari 2026
**Framework:** Laravel + Tailwind CSS
**Status:** ✅ Production Ready
