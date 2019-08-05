use `demo`;
drop table if exists `work`;
create table `work`(
  `id` int primary key auto_increment,
  `member` int unsigned,
  `increment` decimal(6,2),
  `transaction` decimal(6,2),
  `order` int unsigned,
  `created_at` date
)charset=utf8 collate=utf8_general_ci;