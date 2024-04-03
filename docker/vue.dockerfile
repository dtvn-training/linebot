# Alpine Linux is much smaller than most distribution base images.
ARG NODE_VERSION=node:18.14.2

FROM $NODE_VERSION

# Provide default arguments if image was not built by docker compose.
ARG CLEAN_NPM_CACHE=false
ARG ENABLE_TYPESCRIPT=false
ARG HOST=127.0.0.1
ARG PROJECT_PATH=/var/www/html/client
ARG VUE_CLI_VERSION=latest

# Environment variables
ENV CLEAN_NPM_CACHE=$CLEAN_NPM_CACHE
ENV ENABLE_TYPESCRIPT=$ENABLE_TYPESCRIPT
ENV HOST=$HOST
ENV PROJECT_PATH=$PROJECT_PATH
ENV VUE_CLI_VERSION=$VUE_CLI_VERSION

# Directory Setup
WORKDIR $PROJECT_PATH

# Copy existing Vue project
COPY . .

# Setup Vue CLI
RUN npm install -g @vue/cli@$VUE_CLI_VERSION

# If existing vue project, install dependencies
RUN npm install

# Clean npm global cache
RUN if [ "$CLEAN_NPM_CACHE" = "true" ]; then npm cache clean --force; fi

# Command to start the Vue application
CMD ["npm", "run", "serve"]
