# Zerotoprod\Container

![](art/logo.png)

[![Repo](https://img.shields.io/badge/github-gray?logo=github)](https://github.com/zero-to-prod/container)
[![GitHub Actions Workflow Status](https://img.shields.io/github/actions/workflow/status/zero-to-prod/container/test.yml?label=test)](https://github.com/zero-to-prod/container/actions)
[![GitHub Actions Workflow Status](https://img.shields.io/github/actions/workflow/status/zero-to-prod/container/backwards_compatibility.yml?label=backwards_compatibility)](https://github.com/zero-to-prod/container/actions)
[![Packagist Downloads](https://img.shields.io/packagist/dt/zero-to-prod/container?color=blue)](https://packagist.org/packages/zero-to-prod/container/stats)
[![php](https://img.shields.io/packagist/php-v/zero-to-prod/container.svg?color=purple)](https://packagist.org/packages/zero-to-prod/container/stats)
[![Packagist Version](https://img.shields.io/packagist/v/zero-to-prod/container?color=f28d1a)](https://packagist.org/packages/zero-to-prod/container)
[![License](https://img.shields.io/packagist/l/zero-to-prod/container?color=pink)](https://github.com/zero-to-prod/container/blob/main/LICENSE.md)
[![wakatime](https://wakatime.com/badge/github/zero-to-prod/container.svg)](https://wakatime.com/badge/github/zero-to-prod/container)
[![Hits-of-Code](https://hitsofcode.com/github/zero-to-prod/container?branch=main)](https://hitsofcode.com/github/zero-to-prod/container/view?branch=main)

## Contents

- [Introduction](#introduction)
- [Requirements](#requirements)
- [Installation](#installation)
- [Documentation Publishing](#documentation-publishing)
    - [Automatic Documentation Publishing](#automatic-documentation-publishing)
- [Usage](#usage)
- [Local Development](./LOCAL_DEVELOPMENT.md)
- [Contributing](#contributing)

## Introduction

A PSR Compliant Container.

## Requirements

- PHP 7.1 or higher.

## Installation

Install `Zerotoprod\Container` via [Composer](https://getcomposer.org/):

```bash
composer require zero-to-prod/container
```

This will add the package to your project's dependencies and create an autoloader entry for it.

## Documentation Publishing

You can publish this README to your local documentation directory.

This can be useful for providing documentation for AI agents.

This can be done using the included script:

```bash
# Publish to default location (./docs/zero-to-prod/container)
vendor/bin/zero-to-prod-container

# Publish to custom directory
vendor/bin/zero-to-prod-container /path/to/your/docs
```

### Automatic Documentation Publishing

You can automatically publish documentation by adding the following to your `composer.json`:

```json
{
    "scripts": {
        "post-install-cmd": [
            "zero-to-prod-container"
        ],
        "post-update-cmd": [
            "zero-to-prod-container"
        ]
    }
}
```

## Usage



## Contributing

Contributions, issues, and feature requests are welcome!
Feel free to check the [issues](https://github.com/zero-to-prod/container/issues) page if you want to contribute.

1. Fork the repository.
2. Create a new branch (`git checkout -b feature-branch`).
3. Commit changes (`git commit -m 'Add some feature'`).
4. Push to the branch (`git push origin feature-branch`).
5. Create a new Pull Request.
