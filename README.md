# FeelFree
[FeelFree](https://tryfeelfree.com) is a platform for sharing your feelings and thoughts with the world, **anonymously**. It is a place where you can express your emotions, thoughts, and feelings in a safe and secure environment, without the fear of being judged or harassed.

## Installation

FeelFree is a regular Laravel application; it's build on top of Laravel 11 and uses Livewire / Tailwind CSS for the frontend.

In terms of local development, you can use the following requirements:

- PHP 8.3 - with SQLite, GD, and other common extensions.
- Node.js 16 or more recent.

If you have these requirements, you can start by cloning the repository and installing the dependencies:

```bash
git clone https://github.com/tryfeelfree/feelfree.git

cd feelfree

git checkout -b feat/your-feature # or fix/your-fix
```

> **Don't push directly to the `main` branch**. Instead, create a new branch and push it to your branch.

Next, install the dependencies using [Composer](https://getcomposer.org) and [NPM](https://www.npmjs.com):

```bash
composer install

npm install
```

After that, set up your `.env` file:

```bash
cp .env.example .env

php artisan key:generate
```

Prepare your database and run the migrations:

```bash
touch database/database.sqlite

php artisan migrate

php artisan db:seed
```

Finally, start the development server:

```bash
php artisan serve
```

Once you are done with the code changes, be sure to run the test suite to ensure everything is still working:

```bash
composer test
```

If everything is green, push your branch and create a pull request:

```bash
git commit -am "Your commit message"

git push
```

## Features
- [x] Post your worries **anonymously**. We mean it. There is no tracking of your identity whatsoever.
- [x] React to other's worries and share support. 
- [x] Comment on others' worries and make your words help others. 
- [x] React to comments.

## Future Plans
- [ ] Nested comments
- [ ]Add ability to add more reactions
- [ ]Add ability to add more tags
- [ ]Improve UI

---

FeelFree is an open-sourced software licensed under the **[GNU Affero General Public License](LICENSE.md)**
