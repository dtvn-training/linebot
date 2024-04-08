# develop stage
FROM node:lts-alpine as develop-stage
WORKDIR /var/www/html/client/
CMD ["npm", "run", "start"]

# build stage
FROM develop-stage as build-stage
RUN npm run build

# production stage
FROM nginx:latest as production-stage
COPY --from=build-stage /app/dist /usr/share/nginx/html
EXPOSE 80
CMD ["nginx", "-g", "daemon off;"]
