CREATE TABLE payment (
                         id_payment INT AUTO_INCREMENT,
                         id_user INT NOT NULL,
                         value BIGINT NOT NULL,
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

INSERT INTO payment (id_user, card_number, value,  card_owner, card_exp_month, card_exp_year, card_cvc)
VALUES (1, '1234567890123456',100000,'John Doe', 10, 2025, 123),
       (2, '9876543210987654', 100000,'Jane Smith', 12, 2024, 456),
       (3, '5555444433332222', 100000,'Mike Johnson', 8, 2023, 789);


INSERT INTO subscription (id_artist, id_user)
VALUES (1, 2),
       (2, 3),
       (3, 1);


INSERT INTO logging (api_key, ip_address, end_point, description, requested_at) VALUES
                                                                                    ('API_KEY_1', '192.168.1.1', '/endpoint1', 'Description for endpoint 1', '2023-11-07 12:00:00'),
                                                                                    ('API_KEY_2', '192.168.1.2', '/endpoint2', 'Description for endpoint 2', '2023-11-07 12:30:00'),
                                                                                    ('API_KEY_3', '192.168.1.3', '/endpoint3', 'Description for endpoint 3', '2023-11-07 13:00:00');
