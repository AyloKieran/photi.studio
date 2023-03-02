# Photi.Studio

[![Photi's Trending Page][trending]][photi_link]

---

## Introduction 🎯

### Photi.Studio is built using [Laravel][laravel_link], [Laravel Livewire][livewire_link], [Azure Blob Storage][blobs_link] and [Azure Cognitive Services][cv_link].

Photi was created for university module's assessment, and is currently being assessed. <sup><sub>_A grade will be updated here as soon as it is available._</sub></sup>

You can try it now **[on Web][photi_link]**, on **[Google Play][gplay_link]** or _[build it yourself](#getting-started-🚀)_.

---

## Getting Started 🚀

It is assumed that you have a basic understanding of Laravel and Shell commands. Please refer to documention of these before raising an issue 😊.

### Initial Setup

To get a local copy of the source code working, you will need to run the following commands:

```sh
git clone https://github.com/AyloKieran/photi.studio.git
cd photi.studio
cp .env.example .env
php artisan key:generate
```

Once this has completed, you will need to edit the `.env` to fill in the following variables:

### Database Connection

Setup your database credentials:

```env
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

### Azure Blob Storage

Connect your [Azure Blob Storage][blobs_link] account (and optionally set a custom storage URL for blobs):

```env
AZURE_STORAGE_NAME=
AZURE_STORAGE_KEY=
AZURE_STORAGE_CONTAINER=
AZURE_STORAGE_URL=    << OPTIONAL >>
```

### Azure Computer Vision

Connect your [Azure Computer Vision][cv_link] resource:

```env
AZURE_CV_KEY=
AZURE_CV_ENDPOINT=
```

### Unsplash

OPTIONAL: Connect to the [Unsplash API][unsplash_link] to generate test user posts:

```env
UNSPLASH_CLIENT_ID=    << OPTIONAL >>
UNSPLASH_CLIENT_SECRET=    << OPTIONAL >>
UNSPLASH_ACCESS_TOKEN=    << OPTIONAL >>
```

### Mail Server

Connect to your email server to send authentication emails and user notifications:

```env
MAIL_MAILER=smtp
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=
MAIL_FROM_ADDRESS=
```

You are now set to [start the server](#starting-the-server-🎢).

---

## Starting the Server 🎢

To start the web server, run the following command:

```sh
php artisan serve
```

If you require live updates from the UI, run the following command in a new command prompt window:

```sh
npm run dev
```

## Updating 🗞️

An update script has been provided which fully updates the application and clears all caches and is recommended for almost every use case:

```sh
sh update.sh
```

However, if you would like more control over your update process, you can run the following commands:

```sh
npm install
composer install -n --optimize-autoloader
php artisan migrate
npm run build
php artisan optimize:clear
```

---

## Support 🧑‍⚕️

This project is not indended to be used anywhere outside of an academic setting, however, I am willing to help you out if you are genuinely interested!
Please [open an issue][issue_link] or send an email to: [howdy@kierannoble.dev][email_link]

[trending]: /docs/trending.png
[photi_link]: https://photi.studio/
[gplay_link]: https://play.google.com/store/apps/details?id=studio.photi.twa
[laravel_link]: https://laravel.com/
[livewire_link]: https://laravel-livewire.com/
[blobs_link]: https://azure.microsoft.com/en-gb/products/storage/blobs
[cv_link]: https://azure.microsoft.com/en-us/products/cognitive-services/computer-vision
[unsplash_link]: https://unsplash.com/developers
[issue_link]: https://github.com/AyloKieran/photi.studio/issues/new
[email_link]: mailto:howdy@kierannoble.dev
