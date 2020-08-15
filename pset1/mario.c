#include <stdio.h>
#include <cs50.h>


int main(void)
{
    int height;
      
    printf("Enter the height of your pyramid, from 0 to 23\n");

    do
    {
        height = GetInt();
        if(height < 0 || height > 23)
        {
            printf("Try again, Enter a number from 0 to 23:\n");
        }
    } while (height < 0 || height > 23);
    
    for(int i = 0; i < height; i++)
    {
    
        int x = 0;
        int y = height-1;

        while (y > i)
        {
            printf(" ");
            y--;
        }

        do
        {
            printf("#");
            x++;
        } while (x < i+2);
        printf("\n");
        
    }
}