#include <stdio.h>
float MIN(float X, float Y);
float MAX(float X, float Y);
int main()
{
float a,b,c,d;
printf("entrer 4 reels : \n");
scanf("%f%f%f%f",&a,&b,&c,&d);
printf("Le minimum est : %.2f \n",MIN(MIN(a,b),MIN(c,d)));
printf("Le maximum est : %.2f \n",MAX(MAX(a,b),MAX(c,d)));
return 0;
}
float MIN(float X, float Y)
{
if (X<Y)
    return X;
else
    return Y;
}
float MAX(float X, float Y)
{
if (X>Y)
    return X;
else
    return Y;
}
