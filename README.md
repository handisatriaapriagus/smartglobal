# Smart Global Group Website

Responsive PHP website reconstructed from `rev2 website map.pdf` and the supplied brand assets.

## Run with XAMPP

Open `http://localhost/smart_global/home` after Apache is running. Clean page URLs require Apache `mod_rewrite` and `AllowOverride All` for this directory.

The assessment and newsletter forms prefer MySQL using these optional environment variables:

- `SMART_GLOBAL_DB_HOST` (default `127.0.0.1`)
- `SMART_GLOBAL_DB_PORT` (default `3306`)
- `SMART_GLOBAL_DB_NAME` (default `smart_global`)
- `SMART_GLOBAL_DB_USER` (default `root`)
- `SMART_GLOBAL_DB_PASSWORD` (default empty)

Import `database/schema.sql` in phpMyAdmin to enable MySQL storage. Until then, submissions are safely appended to JSONL files inside the protected `storage/` directory.

Assessment and newsletter/E-Insights submissions also send PHP `mail()` notifications to `info@smartglobalplatform.com` and `info.drmoshehatta@gmail.com`. Configure the production server mail transport (SMTP/sendmail) for delivery; failed `mail()` calls are recorded in `storage/mail_failures.log` without blocking form storage. Valid Free Assessment submissions also receive a branded confirmation auto-reply at the submitted email address.

## Source asset note

The supplied `backgrounds/8.png` is not a valid PNG; its contents are an upstream connection error message. The Business Setup page therefore uses the matching supplied business photo and a CSS fallback composition, preserving the design without a broken visual. If a valid export of background 8 becomes available, it can replace the file without changing the page code.
