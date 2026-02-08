# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Personal portfolio/blog site for SlashEquip (Sam), built on **Statamic CMS 4.0** (Laravel 10). Based on the "Starter's Creek" starter kit. Content is flat-file (YAML/Markdown) — no database required for content management.

## Commands

### Development
```bash
npm run dev          # Start Mix dev watcher
npm run watch        # Watch for file changes
npm run hot          # Hot module replacement
npm run production   # Production build (minified, versioned)
php artisan serve    # Start local PHP dev server
```

### Testing & Quality
```bash
php artisan test                    # Run all tests
php artisan test --filter=TestName  # Run a single test
./vendor/bin/phpunit                # Run PHPUnit directly
./vendor/bin/pint                   # Laravel Pint code style fixer
```

### Statamic CLI
```bash
php please          # Statamic-specific artisan commands
php artisan tinker   # Interactive Laravel shell
```

## Architecture

### Content System (Flat-File)
All site content lives in `content/` as YAML files — no database tables:
- `content/collections/blog/` — Blog posts (shown at `/articles`)
- `content/collections/products/` — Product entries (at `/products`)
- `content/collections/pages/` — Static pages
- `content/collections/jobs/` — Job listings
- `content/globals/settings.yaml` — Site-wide settings (social links, personality mode)

### Blueprints
Field definitions for each collection are in `resources/blueprints/collections/`. These define the content model (fields, types, validation) for each collection.

### Templating
Views use **Antlers** templating (`*.antlers.html`) in `resources/views/`:
- `layout.antlers.html` — Base layout wrapping all pages
- `_header.antlers.html`, `_footer.antlers.html`, `_nav.antlers.html` — Shared partials (prefixed with `_`)
- `blog/show.antlers.html` — Single article view
- `blog/index.antlers.html` — Article listing
- `home.antlers.html` — Homepage

### Frontend Stack
- **Tailwind CSS 3.3** with `@tailwindcss/typography` plugin, dark mode via `class` strategy
- **Alpine.js 3.12** with persist plugin for client-side state (dark mode toggle)
- **Prism.js** for code syntax highlighting
- Tailwind config (`tailwind.config.js`) has extensive custom typography/prose styling

### Build System
Two build configs exist — **Laravel Mix** (`webpack.mix.js`) is the active one used by npm scripts. A Vite config also exists but npm scripts point to Mix.

### Routing
Most routes are handled by Statamic's content routing. `routes/web.php` only contains 301 redirects from old blog slug paths to `/articles/{slug}`.

### Control Panel
Statamic CP is accessible at `/cp` for content editing. User accounts are in `users/` as YAML files.

### Statamic Version
Running **Statamic 4.10.1**. String padding modifier is `str_pad_left` (not `pad_left`). After manually adding content files, run `php please stache:clear`.
