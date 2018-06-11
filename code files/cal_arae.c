#include <stdio.h>
#include <math.h>
 
 #DEFINE PI 3.14823;

int main(void) {
float radius;

float area;

radius = getRadius();
area = calculateArea(radius, );
printf("The area of the circle is %f when the radius is %f", area, radius);}

float calculateArea (float radius ) {

float area;

area=PI*radius*radius;
return area;}
float getRadius (){

float radius=0;


printf("Enter the radius of the circle ");
scanf("%f",&radius);
return radius;}