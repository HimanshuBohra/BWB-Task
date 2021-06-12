# BWB-Task
 
# Requirements :
Xampp to run the project as the project is developed using PHP.(Tried Online hosting but it kept failing due to processing csv file).

# Note : 
1. The adress part in CSV should not have commas ',' as they will cause problem.
2. A sample data.csv file is present for testing.
3. UI was not my main focus.

# Validations kept in Mind :
1. Empty Fields 
2. Email Regex Check
3. Email and Phone number Duplicate check(Both are unique keys)
4. Age limit check
5. 3 Types of addresses can be filled and atleast one should be present

# For Query Optimization  
Used mysqli_multi_query() for faster insertion of Data


