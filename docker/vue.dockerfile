FROM node:20.12.0 as develop-stage
WORKDIR /var/www/html/client/
CMD ["npm", "run", "serve"]
