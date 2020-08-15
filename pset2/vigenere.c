



#include <cs50.h>
#include <stdio.h>
#include <string.h>
#include <ctype.h>

int getk(int lettersCiphered, string k)
{
    int k_length = strlen(k);
    return tolower(k[lettersCiphered % k_length]) - 97;
}


int main(int argc, string argv[])
{
    //Checks the arguremnent count
    if (argc != 2)
    {
        printf("Enter the right amount of arguements!\n");
        
        return 1;
    }
    
    //get k value from 1st value in array
    string k = argv[1];
    
    
    for(int i=0, k_length = strlen(k); i<k_length; i++)
    {
        
        if(!isalpha(k[i]))
        {
            printf("Enter an alpha value for k.");
            return 1;
        }
    }
    
    string crypto = GetString();
    
    int lettersCiphered = 0;
    
    for(int i=0, crypto_length = strlen(crypto); i<crypto_length; i++)
    {
        char c = crypto[i];
        
    
    
        if (isupper(c))
        {
            
            char crypt_C = (((c-65) + getk(lettersCiphered, k)) % 26) + 65;
            printf("%c", crypt_C);
            lettersCiphered++;
        }
        else if (islower(c))
        {
            char crypt_C = (((c-97) + getk(lettersCiphered, k)) % 26) + 97;
            printf("%c", crypt_C);
            lettersCiphered++;
        }
        else
        {
            printf("%c", c);
        }
    }
    
    printf("\n");
    return 0;
    
}