<!doctype html>
<html>
<head>
    <title><?= esc($title) ?> - 🗳️ Votes Count</title>
    <meta name="description" content="Barrie election links: candidate links, profiles, debates, endorsements. Everything you need to make an informed vote.">
    <meta property="og:description" content="Barrie election links: candidate links, profiles, debates, endorsements. Everything you need to make an informed vote." />
    <meta property="og:title" content="<?= esc($title) ?>" />
    <meta name="twitter:title" content="<?= esc($title) ?>" />
    <meta property="og:image" content="/assets/votes-count-barrie-og-2022.jpg" />
    <link rel="icon" href="/favicon.ico" type="image/x-icon" />
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/votescount.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fork-awesome@1.2.0/css/fork-awesome.min.css" integrity="sha256-XoaMnoYC5TH6/+ihMEnospgm0J1PM/nioxbOUdnM8HY=" crossorigin="anonymous">
</head>
<body>

<header>
<nav>
  <ul>
    <li>🗳️ Votes Count</li>
<?php /*
    <li><a href="/">Home</a></li>
    <li><a href="/municipal">Municipal</a></li>
    <li><a href="/election">Election</a></li>
    <li><a href="/representatives">Representatives</a></li>
*/ ?>
    <li><a href="#footer">About</a></li>
  </ul>
</nav>

<!-- <p>Votes count in</p> -->
    <h1><?= esc($title) ?></h1>
</header>

<main>