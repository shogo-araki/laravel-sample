FROM nginx:1.20-alpine

ENV TZ Asia/Tokyo

COPY ./docker/nginx/default.conf /etc/nginx/conf.d/default.conf

# wkhtmltopdf をインストールする。
ENV WKHTMLTOPDF_VERSION 0.12.4
RUN wget https://github.com/wkhtmltopdf/wkhtmltopdf/releases/download/${WKHTMLTOPDF_VERSION}/wkhtmltox-${WKHTMLTOPDF_VERSION}_linux-generic-amd64.tar.xz
RUN tar vxfJ wkhtmltox-${WKHTMLTOPDF_VERSION}_linux-generic-amd64.tar.xz \
 && ln -s /opt/wkhtmltox/bin/wkhtmltopdf /usr/bin/wkhtmltopdf

