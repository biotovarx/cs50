/**
 * dictionary.c
 *
 * Computer Science 50
 * Problem Set 5
 *
 * Implements a dictionary's functionality.
 */
#include<cs50.h>
#include <stdbool.h>
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <ctype.h>
#include "dictionary.h"




int hash(const char* word_check);

int wordcount = 0;


typedef struct node
{
    char word[LENGTH +1];
    struct node* next;
} node;

node* hashd[HASH_MAX];



/**
 * Returns true if word is in dictionary else false.
 */
bool check(const char *word)
{
    // TODO
    char* tmp = calloc(1, strlen(word)+1);
    
    for(int i = 0; i<strlen(word); i++)
    {
        tmp[i]= tolower(word[i]);
        
    }
    
    
    node* newnode = hashd[hash(tmp)];
    if (newnode==NULL)
    { 
        free(tmp);
        return false;
    }
    
    
    while(newnode!= NULL)
    {
        if (strcmp(tmp, newnode-> word) ==0)
        {
            free(tmp);
            return true;
        }
        
        newnode=newnode -> next;
        
    }
    
    free(tmp);
    return false;
}

/**
 * Loads dictionary into memory.  Returns true if successful else false.
 */
bool load(const char* dictionary)
{
    // TODOq
    
    FILE* diction =fopen(dictionary,"r");
    
    if(diction == NULL)
    {
        printf("Unable to open %s\n", dictionary);
        return false;
    }
    
    
    node* noded = malloc(sizeof(node));
    
    if(noded == NULL)
    {
        printf("Seg Fault.");
        return false;
    }

    while(fscanf(diction, "%s", noded->word) ==1)
    {
        noded->next = NULL;
        
        int hasher = hash(noded->word);
        
        if(hashd[hasher]==NULL)
        {
            hashd[hasher]= calloc(1, sizeof(node));
            strcpy(hashd[hasher]->word, noded->word);
        }
        else
        {
            node* tmp = malloc(sizeof(node));
            strcpy(tmp->word, noded->word);
            tmp->next = hashd[hasher]->next;
            hashd[hasher]->next=tmp;
            
        }
        wordcount++;

    }
    free(noded);
    fclose(diction);
    
    return true;
}

/**
 * Returns number of words in dictionary if loaded else 0 if not yet loaded.
 */
unsigned int size(void)
{
    // TODO
    
    return wordcount;
}

/**
 * Unloads dictionary from memory.  Returns true if successful else false.
 */
bool unload(void)
{
    // TODO
    
    
    for (int i=0; i<HASH_MAX; i++)
    {
        node* cursor = hashd[i];
        while (cursor != NULL)
        {
            
            node* tmp = cursor;
            cursor = cursor -> next;
            free(tmp);
           
        }
    
    }
    return true;
}

int hash(const char* word_check)
{
    int hasher = 0;
    for(int i =0; word_check[i] != '\0'; i++)
    {
        hasher += toupper(word_check[i]);
    }
    
    return hasher % max_size;
    
}