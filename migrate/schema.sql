CREATE TABLE payment (
                         id_payment INT AUTO_INCREMENT,
                         id_user INT NOT NULL,
                         id_artist INT NOT NULL,
                         amount BIGINT NOT NULL,
                         card_number VARCHAR(16) NOT NULL,
                         card_owner VARCHAR(255) NOT NULL,
                         card_exp_month INT NOT NULL,
                         card_exp_year INT NOT NULL,
                         card_cvc INT NOT NULL,
                         PRIMARY KEY (id_payment)
);

CREATE TABLE subscription (
                              id_subscription INT AUTO_INCREMENT,
                              id_artist INT NOT NULL,
                              id_user INT NOT NULL,
                              status varchar(16) NOT NULL,
                              PRIMARY KEY (id_subscription)
);

CREATE TABLE logging (
                      id_logging INT AUTO_INCREMENT,
                      api_key VARCHAR(255) NOT NULL,
                      ip_address VARCHAR(255) NOT NULL,
                      end_point VARCHAR(255) NOT NULL,
                      description TEXT NOT NULL,
                      requested_at TIMESTAMP NOT NULL,
                      PRIMARY KEY (id_logging)
);