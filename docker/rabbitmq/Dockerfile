FROM rabbitmq:3-management

RUN apt-get update && apt-get install -y \
    build-essential \
    wget curl unzip

RUN curl -L https://github.com/rabbitmq/rabbitmq-delayed-message-exchange/releases/download/v3.13.0/rabbitmq_delayed_message_exchange-3.13.0.ez > rabbitmq_delayed_message_exchange-3.13.0.ez && \
mv rabbitmq_delayed_message_exchange-3.13.0.ez plugins/

RUN rabbitmq-plugins enable rabbitmq_delayed_message_exchange
