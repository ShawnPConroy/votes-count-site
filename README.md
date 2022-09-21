# Votes Count site


## Installation & updates

```
git clone https://github.com/ShawnPConroy/votes-count-site.git .
composer install
```

Use `composer update` whenever there is a new release of the framework.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

- `env.default` to `.env`
- `app/Config/App.php.default` edit and remove `.default`
- `app/Config/Security.php.default` edit and remove `.default`

If in production run `composer --no-dev`.