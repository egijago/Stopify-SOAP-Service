FROM openjdk:8
EXPOSE 8001
COPY ./target /app
WORKDIR /app
ENTRYPOINT ["java", "-jar", "stopify_soap-jar-with-dependencies.jar"]