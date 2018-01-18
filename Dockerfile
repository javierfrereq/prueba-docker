FROM python:alpine

MAINTAINER FREDDY JAVIER FRERE QUINTERO

RUN apk update && apk upgrade 
RUN apk add git

RUN pip3 install flask pytest boto3

WORKDIR /app

COPY contenedores/servicio.py /app

EXPOSE 5000

ENTRYPOINT ["python"]

CMD ["python -m servicio"]
