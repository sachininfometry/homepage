# Infometry Homepage

Custom WordPress homepage implementation for Infometry, packaged as the
`infometry-custom-templates` plugin.

![Infometry homepage preview](docs/homepage-preview.png)

## Repository contents

- `infometry-custom-templates/` — installable WordPress plugin source.
- `preview-full.html` — standalone local preview of the complete homepage.
- `docs/homepage-preview.png` — current desktop preview.

## WordPress installation

1. Zip the `infometry-custom-templates` directory.
2. Upload it from **WordPress → Plugins → Add New → Upload Plugin**.
3. Activate or replace the existing plugin version.
4. Clear WordPress, Cloudways/Varnish, and browser caches.

Version 1.7.1 automatically applies the custom design to the existing WordPress
front page. It keeps the BeTheme header/navigation, suppresses the legacy
BeTheme subheader, Slider Revolution hero, and theme footer on that page, and
renders the custom hero and custom footer instead.

## Local preview

Serve the repository root with any static HTTP server, for example:

```bash
python -m http.server 4189
```

Then open `http://127.0.0.1:4189/preview-full.html`.
