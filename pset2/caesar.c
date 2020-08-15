

#include <cs50.h>
#include <stdio.h>
#include <string.h>
#include <ctype.h>

int main(int argc, string argv[])
{
    //Checks the arguremnent count
    if (argc != 2)
    {
        printf("Enter the right amount of arguements!\n");
        
        return 1;
    }
    
    //get k value from 1st value in array
    int k = atoi(argv[1]);
    
    string crypto = GetString();

    
    for(int i=0, crypto_length = strlen(crypto); i<crypto_length; i++)
    {
        char c = crypto[i];
        
        if (isupper(c))
        {
            
            char crypt_C = (((c-65)+k) % 26) + 65;
            printf("%c", crypt_C);
        }
        else if (islower(c))
        {
            char crypt_C = (((c-97)+k) % 26) + 97;
            printf("%c", crypt_C);
        }
        else
        {
            printf("%c", c);
        }
    }
    printf("\n");
    return 0;
    
}