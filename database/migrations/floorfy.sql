CREATE TABLE `properties`
(
    `id`          CHAR(36)     NOT NULL,
    `title`       VARCHAR(255) NOT NULL,
    `description` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `tours`
(
    `id`          CHAR(36) NOT NULL,
    `property_id` CHAR(36) NOT NULL,
    `enabled`     BOOLEAN  NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`property_id`) REFERENCES properties (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
