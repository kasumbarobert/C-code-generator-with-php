#include<stdio.h>
 #include<math.h>

int main(void) {
int salary;

int gross=1000;

int rate=0.005;

int hours;

printf("enter the number of hours worked");
scanf("%d",&hours);
printf("you have worked for%d hours", hours);
salary=(hours*rate*gross);
printf("your salary is %d", salary);
