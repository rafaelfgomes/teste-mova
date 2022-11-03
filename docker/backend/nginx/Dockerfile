FROM nginx:alpine

COPY docker/backend/nginx/default.conf /etc/nginx/conf.d/default.conf

EXPOSE 8080

ENTRYPOINT [ "nginx" ]

CMD [ "-g", "daemon off;" ]