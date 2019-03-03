FROM redis:4.0.2-alpine

## TODO with custom config web service can`t connect to it; connection refused by redis
#COPY redis.conf /usr/local/etc/redis/redis.conf

COPY ["./scripts/", "/docker/bin/"]
## compatible with windows
RUN chmod a+x /docker/bin/*.sh \
    && sed -i -e 's/\r$//' /docker/bin/*.sh
ENV PATH="$PATH:/docker/bin/"

CMD ["/docker/bin/run.sh"]