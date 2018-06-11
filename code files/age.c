#include<stdio.h>
 #include<math.h>

int main(void) {
int birthdate;

int datetoday=2015;

printf("enter the year you were born");
int birthyear;

scanf("%d",&birthyear);
int age;

age=datetoday-birthyear;
printf("the age is %d ", age);
