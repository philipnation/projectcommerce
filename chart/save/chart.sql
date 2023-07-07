-- Create the orders table
CREATE TABLE orders (
  order_id INT PRIMARY KEY AUTO_INCREMENT,
  order_date DATE,
  order_price DECIMAL(10, 2)
);

-- Insert sample data for different years, months, and days
INSERT INTO orders (order_date, order_price) VALUES
  ('2021-01-01', 100.00),
  ('2021-02-05', 150.00),
  ('2021-02-08', 200.00),
  ('2021-03-10', 120.00),
  ('2021-04-15', 180.00),
  -- Add more sample data here
  
  -- Example data for 2022
  ('2022-01-03', 90.00),
  ('2022-02-10', 160.00),
  ('2022-03-15', 250.00),
  ('2022-04-20', 170.00),
  -- Add more sample data here
  
  -- Example data for 2023
  ('2023-01-02', 110.00),
  ('2023-02-09', 180.00),
  ('2023-03-12', 270.00),
  ('2023-04-18', 190.00);
  -- Add more sample data here
