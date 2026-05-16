# Bluffdale ACM Chapter — Blog Post: AdaptIndex

Files for publishing the *AdaptIndex* research-spotlight blog post to
[bluffdale.acm.org/blog/](https://bluffdale.acm.org/blog/).

The site is **WordPress**. The active theme uses a custom Page template
(`page-blog.php`) that lists posts in the `blog` category as cards.

## Files

| File | Purpose |
|---|---|
| `blog/adaptindex-post-body.html` | **Primary deliverable.** Body-only HTML (style + article). Paste into WP Admin → Posts → Add New → Code editor. Publishes as a Post in category `Blog`, so it appears on `/blog/`. |
| `blog/adaptindex-preview.html` | Standalone, full-chrome preview (mock header + footer). Open locally in a browser to review styling before publishing. Not for upload. |
| `blog/page-adaptindex.php` | Alternative: a WP **Page** template. Drop into the active theme, then create a Page that uses this template. Lives at `/adaptindex/`. Does **not** appear on `/blog/` (the listing queries posts, not pages). Use this only if you want a dedicated standalone URL in addition to the Post. |
| `blog/page-blog.php` | Reference copy of the existing blog listing template currently installed in the theme. No changes needed. |
| `blog/featured-image.svg` | Editorial-poster SVG (1600&times;900) used as the in-article hero and for the WP Featured image / Open Graph card. Same image is also inlined into the three article files above, so paste-publish doesn't depend on the upload succeeding. |
| `blog/featured-image.png` / `blog/featured-image@2x.png` | PNG renders of the poster (1600&times;900 and 3200&times;1800). Upload these instead of the SVG because WP core blocks SVG uploads. |
| `blog/additional-css.css` | Defensive CSS snippet for **Appearance &rarr; Customize &rarr; Additional CSS**. Use this to fix an already-published post without re-editing the body HTML. See the **Theme collision** section below. |

## Theme collision &mdash; the "ugly post" bug

The active chapter theme (extracted from `assets.zip`) defines several global classes that the AdaptIndex post originally collided with:

| Class | Theme behavior | Result on our post |
|---|---|---|
| `.hero` | Navy 520-px banner, flex-centered, `color: white`, expects a background image overlay | Our hero block became a 520-px navy box with a white title on warm paper background. **Primary cause of the ugly rendering.** |
| `.eyebrow` | `display: block`, blue, letter-spacing 3px | Overridden cleanly by `.adaptindex-article .eyebrow` (specificity wins). Not a bug. |
| `.container` | `max-width: 1200px` | Overridden cleanly by `.adaptindex-article .container`. Not a bug. |

There is also no `single.php` in the theme &mdash; single posts fall back to `index.php`, which renders `<h1><?php the_title(); ?></h1>` above `the_content()`. The original post HTML also had its own `<h1>` inside `.hero`, so the title was rendered twice.

### Fix applied to the repo files

1. Renamed `.hero` &rarr; `.ai-hero` everywhere in the article CSS and HTML, so no theme class can match.
2. Removed the inner `<h1>` from `blog/adaptindex-post-body.html` so the theme's `<h1><?php the_title(); ?></h1>` is the only title on Post-path renderings.
3. The Page-template version (`blog/page-adaptindex.php`) and the standalone preview (`blog/adaptindex-preview.html`) **keep** their inner `<h1>` because in those contexts no outer title is rendered.

### How to push the fix live &mdash; pick one

**Path 1: Re-edit the post (recommended).**
- WP Admin &rarr; Posts &rarr; edit the AdaptIndex post.
- &vellip; menu (top-right) &rarr; **Code editor**.
- Select all, delete, paste fresh content from `blog/adaptindex-post-body.html` (between the marker lines).
- Update.

**Path 2: Patch via Customizer (no post edit).**
- WP Admin &rarr; Appearance &rarr; **Customize** &rarr; **Additional CSS**.
- Paste the contents of `blog/additional-css.css`.
- Publish.
- The snippet neutralizes the theme's `.hero` properties on `.adaptindex-article .hero` only, and attempts to hide the duplicate outer title with `:has()`. Modern browsers only. Less clean than Path 1 but no editor required.

## Recommended publish flow

1. Log in to WordPress admin on `bluffdale.acm.org`.
2. **Posts → Add New**.
3. Title: `How a 12 MB Model Picks the Right Vector Index for IoT Workloads`
4. Switch to **Code editor** (top-right ⋮ menu) — or insert a single **Custom HTML** block.
5. Copy the content of `blog/adaptindex-post-body.html` between the `PASTE FROM HERE` / `STOP PASTING HERE` markers and paste it in.
6. Right sidebar:
   - **Categories**: check `Blog` (must match the slug `blog` that `page-blog.php` queries).
   - **Excerpt**:
     > A 12 MB gradient-boosting model that adaptively picks vector indexes for IoT workloads, cutting P95 latency by 29% across a 90-day simulation of 47 edge gateways.
   - **Author**: set to your WP user (this drives the `✍ author` chip on the listing).
   - **Featured image** (optional but recommended for social sharing):
     - Upload `blog/featured-image.svg` to **Media Library**.
     - Click **Set featured image** in the post sidebar and pick it.
     - Note: the current `page-blog.php` does *not* render thumbnails on the
       listing card, so the featured image will only appear in:
         - The article itself (it's already inlined as the hero &mdash; you'll
           see it whether or not you set the WP Featured image),
         - Open Graph / Twitter Card previews when the post is shared,
         - Any future theme update that calls `the_post_thumbnail()`.
     - If you want the image visible on the `/blog/` listing card too, ask
       for the page-blog.php thumbnail patch.
7. **Publish**.
8. Visit `/blog/` and confirm the new card appears with date, "Blog" chip, author chip, title, and excerpt.

## Theme-compatibility notes

- All article CSS is namespaced under `.adaptindex-article`, so it cannot
  leak into the theme or other posts.
- The post's typographic system (Fraunces serif display + IBM Plex
  Sans/Mono body, warm paper `#fbfaf7`, navy `#0a1f44`, terra-cotta
  `#c84a30`) is intentionally distinct from the listing's blue
  `#185FA5` palette — that contrast is fine because the listing card is
  rendered by `page-blog.php` (which uses its own CSS) while the post
  body inherits the AdaptIndex styles only when its own `<article>` is
  on screen.
- Google Fonts (Fraunces, IBM Plex Sans, IBM Plex Mono) are loaded via
  the embedded `@import` at the top of the article CSS. If the theme
  already enqueues these, the duplicate import is harmless.

## Quick edits you may want to make before publishing

- **Read time** in the byline (`7 min read`) — adjust if you change the body length.
- **Author name** — currently `Chandrashekhar M`. Change in the hero `<div class="byline">` and the `.closing` paragraph.
- **Closing role** — currently `Vice Chair, Bluffdale ACM Chapter`.
- **Contact email** — currently `chandrashekhar.medicherla@ieee.org` (used as `mailto:` and as link text in the `.closing`).
- **ResearchGate link** in the CTA button — already pointing at the
  AdaptIndex publication; replace if a canonical DOI / preprint URL
  becomes preferable.
