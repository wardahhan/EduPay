# 📱 Responsive Design Testing Checklist

## Browser DevTools Testing

### Chrome DevTools (Recommended)
1. Open Developer Tools: `F12` or `Ctrl+Shift+I`
2. Toggle Device Toolbar: `Ctrl+Shift+M`
3. Select device from dropdown at top
4. Test each resolution below

### Firefox DevTools
1. Open DevTools: `F12`
2. Click Responsive Design Mode: `Ctrl+Shift+M`
3. Select or customize device size

---

## Testing Resolutions

### Mobile (320px - 480px)
Device examples: iPhone SE, iPhone 5S, iPhone 11, Samsung Galaxy S10

**Admin Pages:**
- [ ] Dashboard - Hamburger menu visible, content readable
- [ ] Kelas Index - Search bar full width, table scrolls horizontally
- [ ] Siswa Index - Buttons stacked, action icons visible
- [ ] SPP Index - Form responsive
- [ ] Create Kelas - Form fields full width, readable
- [ ] Create Siswa - Multi-section form scrolls smoothly

**Petugas Pages:**
- [ ] Dashboard - Hamburger menu, stat cards stack vertically
- [ ] Pembayaran Form - All fields full width, dropdowns clickable
- [ ] History - Search bar responsive, table scrollable
- [ ] Detail Pembayaran - Information displays clearly

**Siswa Pages:**
- [ ] Dashboard - Summary cards stack, table readable
- [ ] Riwayat - Responsive header, table scrolls horizontally
- [ ] Profil - Information displays in single column

### Tablet (481px - 768px)
Device examples: iPad Mini, iPad Air, Nexus 7

**Admin Pages:**
- [ ] Dashboard - Sidebar still hamburger or visible?, 2-column grid working
- [ ] Index pages - 2-column layouts working, spacing comfortable
- [ ] Forms - 2-column input layout working
- [ ] Buttons - Not overlapping, properly sized

**Petugas Pages:**
- [ ] Dashboard - Metric cards in 2 columns
- [ ] Forms - Input fields in 2 columns
- [ ] Tables - All columns visible or scrollable

**Siswa Pages:**
- [ ] Layout - Sidebar visible?, content readable
- [ ] Cards - 2-column layout for summary cards
- [ ] Tables - Horizontal scroll smooth

### Desktop (769px - 1024px)
Device examples: iPad Pro, Laptop

**All Pages:**
- [ ] Sidebar visible and stable
- [ ] Multi-column layouts (3-4 columns)
- [ ] Content max-width appropriate
- [ ] No excessive whitespace
- [ ] All features accessible

### Large Desktop (1025px+)
Device examples: 1080p monitor, 4K monitor

**All Pages:**
- [ ] Full layout with sidebar
- [ ] proper spacing and alignment
- [ ] Content not stretched too wide
- [ ] All elements properly proportioned

---

## Specific Feature Testing

### Navigation & Menus
**Mobile/Tablet:**
- [ ] Hamburger menu visible on small screens
- [ ] Click hamburger → sidebar slides in smoothly
- [ ] Overlay semi-transparent appears
- [ ] Click overlay → sidebar closes
- [ ] Click menu item → navigation works
- [ ] No console errors

**All Screens:**
- [ ] Active menu item highlighted
- [ ] All menu links working
- [ ] Logout button accessible

### Forms & Inputs
**All Devices:**
- [ ] Input fields full width (mobile) or properly sized
- [ ] Labels clearly visible above inputs
- [ ] Error messages display in red
- [ ] Placeholder text visible
- [ ] Focus state with red ring visible
- [ ] No horizontal scrolling
- [ ] Buttons not shrunk/stretched
- [ ] iOS keyboard doesn't cover inputs (vertical scroll works)

**Mobile Specific:**
- [ ] Font size ≥ 12px (no auto-zoom trigger on iOS)
- [ ] Input height ≥ 40px (touch-friendly)
- [ ] Buttons have comfortable spacing
- [ ] Textarea/select fully accessible

### Tables
**Mobile (< 640px):**
- [ ] Table has horizontal scroll
- [ ] Vertical columns visible and readable
- [ ] Action buttons (edit/delete) accessible
- [ ] Font size reduced appropriately
- [ ] No cut-off content

**Tablet (640px+):**
- [ ] Table starting to fit or scrolls smoothly
- [ ] All columns visible or partially visible
- [ ] Action icons properly sized

**Desktop:**
- [ ] Full table visible without scroll
- [ ] Proper spacing
- [ ] Hover effects working

### Cards & Grids
**Mobile:**
- [ ] Single column layout
- [ ] Proper gap between cards
- [ ] Touch-friendly card size

**Tablet:**
- [ ] 2-column grid layout
- [ ] Gaps responsive

**Desktop:**
- [ ] 3-4 column grid layout
- [ ] Proper card sizing
- [ ] Good use of space

### Typography
**All Devices:**
- [ ] Headings readable size
- [ ] Body text ≥ 12px on mobile
- [ ] No text overlap
- [ ] Line height comfortable
- [ ] No truncated text (unless intentional)

### Images & Icons
**All Devices:**
- [ ] Images scale properly
- [ ] Icons visible and appropriate size
- [ ] No distortion

### Modals & Popups
**All Devices:**
- [ ] Modal/alert centered and readable
- [ ] Close button easily accessible
- [ ] Overlay prevents interaction with background
- [ ] Text readable
- [ ] Buttons clickable

---

## Specific Page Testing

### Admin Dashboard
**Mobile:**
- [ ] Header stacked (name/avatar separate)
- [ ] Stat cards single column
- [ ] Links accessible
- [ ] No overflow

**Tablet:**
- [ ] Header flexible
- [ ] Stat cards 2 columns
- [ ] Content readable

**Desktop:**
- [ ] Header with avatar on same row
- [ ] Stat cards 4 columns
- [ ] Full layout visible

### Data List Pages (Kelas, Siswa, SPP, Petugas)
**Mobile:**
- [ ] Search bar full width
- [ ] Buttons stacked or horizontal?
- [ ] Table scrolls right for actions
- [ ] Pagination buttons accessible
- [ ] "Tampilkan X data" readable

**Tablet/Desktop:**
- [ ] Search & filter row wraps properly
- [ ] Table columns visible
- [ ] Action buttons clearly visible
- [ ] Pagination working

### Create/Edit Forms
**Mobile:**
- [ ] Form scrolls smoothly
- [ ] No field overlap
- [ ] Submit/Cancel buttons visible and accessible
- [ ] Back button accessible
- [ ] Multi-step forms (if any) work

**Tablet/Desktop:**
- [ ] 2-column layout for related fields
- [ ] All fields visible (no cut-off)
- [ ] Large input fields comfortable to use

### Pembayaran Form (Petugas)
**Mobile:**
- [ ] 4 dropdowns readable and clickable
- [ ] Buttons at bottom accessible
- [ ] No horizontal scroll
- [ ] Form sections clear

**Tablet/Desktop:**
- [ ] 2-column bulan/tahun layout working
- [ ] Dropdowns responsive
- [ ] Form sections organized

### History Pembayaran (Petugas)
**Mobile:**
- [ ] Header stacked (title & badge)
- [ ] Search bar responsive
- [ ] Filter dropdowns accessible
- [ ] Table scrollable

**Tablet/Desktop:**
- [ ] Header flexible
- [ ] Search & filter in one row
- [ ] Table visible

### Riwayat Pembayaran (Siswa)
**Mobile:**
- [ ] Header readable
- [ ] Description text not cut-off
- [ ] Table scrolls horizontally
- [ ] All columns accessible

**Tablet/Desktop:**
- [ ] Table with proper padding
- [ ] No excessive scrolling needed

### Profil (Siswa)
**Mobile:**
- [ ] Header stacked (title & badge separate)
- [ ] All info visible
- [ ] Single column layout
- [ ] Status badge visible

**Tablet/Desktop:**
- [ ] 2-column info grid working
- [ ] Comfortable reading

### Receipts/Print (Cetak Bukti)
**Mobile:**
- [ ] Receipt sized appropriately
- [ ] All information readable
- [ ] QR code (if any) visible
- [ ] Print button accessible

**Desktop:**
- [ ] Receipt preview centered
- [ ] Print preview working
- [ ] Printer settings working

---

## Cross-Browser Testing

### Chrome/Edge
- [ ] Latest version tested
- [ ] All features working
- [ ] No console errors

### Firefox
- [ ] Latest version tested
- [ ] Layout matches Chrome
- [ ] Responsive features working

### Safari (macOS)
- [ ] Latest version tested
- [ ] Layout correct
- [ ] Input fields working

### Mobile Safari (iOS)
- [ ] iPhone SE tested minimum
- [ ] No zoom required to read text
- [ ] Inputs don't trigger unwanted zoom
- [ ] Touch scroll smooth
- [ ] Hamburger menu works
- [ ] All buttons clickable

### Chrome Mobile (Android)
- [ ] Samsung Galaxy tested (if available)
- [ ] Layout responsive
- [ ] Touch targets adequate
- [ ] Navigation smooth

---

## Accessibility Testing

### Keyboard Navigation
- [ ] Tab through all interactive elements
- [ ] Tab order logical (left to right, top to bottom)
- [ ] Focus indicator always visible (red ring)
- [ ] Enter/Space keys activate buttons
- [ ] Escape closes modals/menus

### Screen Reader (NVDA/JAWS)
- [ ] Headings announced correctly
- [ ] Form labels associated with inputs
- [ ] Button purposes clear
- [ ] Links have descriptive text (not "click here")
- [ ] Images have alt text
- [ ] Tables have proper headers

### Color Contrast
- [ ] Text readable against background
- [ ] Form error messages visible (red text on white)
- [ ] Buttons have sufficient contrast

### Touch Accessibility
- [ ] All buttons ≥ 44x44px
- [ ] Touch targets properly spaced
- [ ] No fat-finger errors
- [ ] Long-press doesn't needed

---

## Performance Testing

### PageSpeed Insights
- [ ] Mobile score ≥ 70
- [ ] Desktop score ≥ 90
- [ ] CLS (layout shift) minimal
- [ ] FCP (first paint) < 2s

### Mobile Slow (Chrome DevTools)
- [ ] Pages load acceptably on slow 3G
- [ ] Layout doesn't jump
- [ ] Content readable during load

### No JavaScript (Accessibility)
- [ ] Basic layout still works
- [ ] Navigation works (hamburger not required)
- [ ] Forms work (except dynamic features)

---

## Responsive Specific Checks

### Hamburger Menu
- [ ] Visible only on small screens
- [ ] Smooth animation (350ms+)
- [ ] Overlay prevents bg interaction
- [ ] Click anywhere to close

### Sidebar
- [ ] Hidden/collapsed on mobile
- [ ] Visible on tablet+
- [ ] Overflow-y auto for long menus
- [ ] Active item highlighted

### Breakpoint Transitions
- [ ] Smooth transition at 640px (sm breakpoint)
- [ ] Smooth transition at 768px (md breakpoint)
- [ ] Smooth transition at 1024px (lg breakpoint)
- [ ] No sudden layout shifts

### Viewport Meta Tag
- [ ] Width is device-width
- [ ] Initial scale is 1.0
- [ ] Viewport-fit: cover present

---

## Bug Fixes During Testing

If issues found, note them:

| Issue | Location | Severity | Fix |
|-------|----------|----------|-----|
| | | | |
| | | | |

---

## Final Sign-off

- [ ] All mobile devices tested
- [ ] All tablets tested
- [ ] Desktop testing complete
- [ ] Cross-browser testing done
- [ ] Accessibility verified
- [ ] Performance acceptable
- [ ] No breaking bugs found
- [ ] Ready for production

---

**Testing Date:** _______________
**Tested By:** _______________
**Browser Versions Tested:** _______________
**Devices Tested:** _______________
**Status:** ✅ APPROVED / ❌ NEEDS FIXES

