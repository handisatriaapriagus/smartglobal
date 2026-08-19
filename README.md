# Smart Global Group Website

Responsive PHP website reconstructed from `rev2 website map.pdf` and the supplied brand assets.

## Run with XAMPP

Open `http://localhost/smart_global/` after Apache is running.

The assessment and newsletter forms prefer MySQL using these optional environment variables:

- `SMART_GLOBAL_DB_HOST` (default `127.0.0.1`)
- `SMART_GLOBAL_DB_PORT` (default `3306`)
- `SMART_GLOBAL_DB_NAME` (default `smart_global`)
- `SMART_GLOBAL_DB_USER` (default `root`)
- `SMART_GLOBAL_DB_PASSWORD` (default empty)

Import `database/schema.sql` in phpMyAdmin to enable MySQL storage. Until then, submissions are safely appended to JSONL files inside the protected `storage/` directory.

## Source asset note

The supplied `backgrounds/8.png` is not a valid PNG; its contents are an upstream connection error message. The Business Setup page therefore uses the matching supplied business photo and a CSS fallback composition, preserving the design without a broken visual. If a valid export of background 8 becomes available, it can replace the file without changing the page code.
