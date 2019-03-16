# Readme

## Requirements

- Docker
- Docker Compose

Tested on Ubuntu 18.04 and Google Chrome.

## Installation

1. Clone the repository
1. Modify `docker-compose.yml` as necessary
1. Create `.env`
1. Start containers
1. Run migrations inside app container

## Using SSL

1. Copy the certificates in `./docker/nginx/cert/` to `/usr/local/share/ca-certificates/`
1. Run `sudo update-ca-certificates`
1. Enable `chrome://flags/#allow-insecure-localhost`

## Other

- Run php and npm commands inside the app container
