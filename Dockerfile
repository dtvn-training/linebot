# develop stage
FROM node:lts-alpine as develop-stage
WORKDIR /app
COPY ./contents/client ./
# Không install node_module cho client (bằng docker-compose run --rm npm install)
# RUN npm install # chỉ chạy ở lần đầu tiên , sử dụng lệnh này để cài trong máy ảo 
# RUN npm install -g @vue/cli-service # chỉ chạy ở lần đầu tiên 
# muốn cài thêm package thì thêm lệnh : ví dụ : npm install axios 
COPY . .
CMD ["npm", "run", "start"]

# build stage
FROM develop-stage as build-stage
RUN npm run build

# production stage
FROM nginx:latest as production-stage
COPY --from=build-stage /app/dist /usr/share/nginx/html
EXPOSE 80
CMD ["nginx", "-g", "daemon off;"]
