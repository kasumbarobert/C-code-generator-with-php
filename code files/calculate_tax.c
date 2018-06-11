#include <stdio.h>
#include <math.h>
 
 #define RATE_A 0.03 
 #define RATE_B 0.02 
 #define RATE_C 0.01 
 #define RATE_D 0.005 
 #define RATE_O 0.01

char getSalaryGrade (int salary ) ;

int main(void) {
int salary;

printf("Enter the salary you earn per month");
scanf("%d",&salary);
char salaryGrade;

salaryGrade = getSalaryGrade(salary);
float tax;

switch(salaryGrade) {

case 'A' :
tax=salary*RATE_A;break;

case 'B' :
tax=salary*RATE_B;break;
case 'C' :
tax=salary*RATE_C;break;
case 'D' :
tax=salary*RATE_D;break;
default :
tax=salary*RATE_O;break;}
printf("Your salary is %d dollars and you have to pay a tax of %f dollars", salary, tax);}

char getSalaryGrade (int salary ) {

char grade;

if(salary>80000){
grade='A';
return grade;}else if (salary>50000) {
grade='B';

return grade;}else if (salary>=30000) {
grade='C';
return grade;}else {
grade='D';
return grade; 
}}