#include <stdio.h>
#include <stdlib.h>

struct elemento
{
    int dado;
    struct elemento *prox;
};
typedef struct elemento *ApElemento;
typedef struct
{
    ApElemento ini;
    ApElemento fim;
} Fila;

#define TRUE 1
#define FALSE 0

// Cria e inicializa uma fila vazia
Fila criaFila()
{
    Fila f;
    f.ini = NULL;
    f.fim = NULL;
    return f;
}

// Verifica se a fila está vazia
int filaVazia(Fila f)
{
    if (f.ini == NULL)
    {
        return TRUE;
    }
    else
    {
        return FALSE;
    }
}
// Imprime todos os elementos da fila
void imprimeFila(Fila f)
{
    ApElemento ap;
    printf("\nItens da fila:\n");
    ap = f.ini;
    while (ap != NULL)
    {
        printf("%d - ", ap->dado);
        ap = ap->prox;
    }
    printf("\n");
}
// Insere um elemento no final da fila
Fila insereFila(Fila f, int e)
{
    ApElemento novo;
    novo = malloc(sizeof(struct elemento));
    if (novo == NULL)
    {
        printf("\nErro ao alocar memoria!\n");
        return f;
    }
    novo->dado = e;
    novo->prox = NULL;

    if (filaVazia(f))
    {
        f.ini = novo;
        f.fim = novo;
    }
    else
    {
        // Liga o último elemento ao novo elemento
        f.fim->prox = novo;
        f.fim = novo;
    }

    return f;
}
// Remove um elemento do início da fila
// O valor removido é armazenado em *e
Fila retiraFila(Fila f, int *e)
{
    ApElemento ap;

    if (!filaVazia(f))
    {
        *e = f.ini->dado;
        ap = f.ini;
        f.ini = f.ini->prox;
        free(ap);
        if (filaVazia(f))
        {
            f.fim = NULL;
        }
    }
    else
    {
        // Indica que a fila está vazia
        *e = -1;
        printf("\nFila Vazia!\n");
    }

    return f;
}

int main()
{
    Fila f;
    int opcao;
    int valor;

    // Cria uma fila vazia
    f = criaFila();

    do
    {
        printf("\nMENU DA FILA\n");
        printf("1 Inserir elemento na fila\n");
        printf("2 Retirar elemento da fila\n");
        printf("3 Imprimir fila\n");
        printf("4 Sair\n");
        printf("Escolha uma opcao: ");

        scanf("%d", &opcao);

        switch (opcao)
        {
        case 1:
            printf("\nDigite o valor para inserir: ");
            scanf("%d", &valor);

            f = insereFila(f, valor);

            printf("\nElemento inserido com sucesso!\n");
            break;

        case 2:
            f = retiraFila(f, &valor);

            if (!filaVazia(f))
            {
                printf("\nElemento removido: %d\n", valor);
            }

            break;

        case 3:
            imprimeFila(f);
            break;

        case 4:
            printf("\nEncerrando o programa...\n");
            break;

        default:
            printf("\nOpcao invalida!\n");
            break;
        }

    } while (opcao != 4);

    return 0;
}
