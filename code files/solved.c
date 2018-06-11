#include<stdio.h>
 #include<math.h>

int getBonus (int age ) ;

int main(void) {
int sum=0;

int i=0;

int j=0;
while(j<10){
sum=sum+j;
j++;}
printf("The sum of the first 10 numbers is %d", sum);}
int total=0;
}

int getBonus (int age ) {

switch(age) {
case 10 :
return 10 ;break;
case 20 :
return 15 ;break;
case 30 :
return 20 ;break;
case 50 :
return 25 ;break;
case 60 :
return 30 ;break;
case 70 :
return 35 ;break;
default :
return 0 ;break;}}}