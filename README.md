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
   - **Featured image** (optional): not rendered by current `page-blog.php`, but useful for social-share cards.
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
