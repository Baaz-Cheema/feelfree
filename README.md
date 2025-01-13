# FeelFree
[FeelFree](https://tryfeelfree.com) is a platform for sharing your feelings and thoughts with the world, **anonymously**. It is a place where you can express your emotions, thoughts, and feelings in a safe and secure environment, without the fear of being judged or harassed.

## Setup Instructions
1. Clone the repository: `git clone https://github.com/tryfeelfree/feelfree.git`
2. Install dependencies: `composer install`
3. Run migrations: `php artisan migrate`. We are using SQLite so nothing to set up. 
4. Run seeds: `php artisan db:seed` this will create some data so you can see website in action
5. Run the server: `php artisan serve`

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

## Contributing
All contributions are welcome. Please fork the repository and create a pull request.

---

FeelFree is an open-sourced software licensed under the **[GNU Affero General Public License](LICENSE.md)**
