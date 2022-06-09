import random
import time

def arrayRandom(v, n):
    for i in range(0,n):
        v.append(random.randint(0, 1001));
    return v

def arrayOrdenado(v, n):
    for i in range(0,n):
        v.append(i);
    return v

def arrayDescrescente(v, n):
    for i in range(n-1,-1, -1):
    	v.append(i);
    return v

def insertionSort(v, n):
    for i in range(1, n):
        k = v[i]
        j = i-1
        while(j>=0 and v[j]>k):
            v[j+1] = v[j]
            j = j-1
        v[j+1] = k
    return v

def melhorCaso():
    n=100
    while(n<=1000):
        media = 0
        for i in range(0, 1000):
            v = []
            v = arrayOrdenado(v, n)
            inicio = time.time()
            v = insertionSort(v, n)
            fim = time.time()
            media += fim-inicio
        print(str(n) + " " + str(media/1000))
        n+=100

def medioCaso():
    n=100
    while(n<=1000):
        media = 0
        for i in range(0, 100):
            v = []
            v = arrayRandom(v, n)
            inicio = time.time()
            v = insertionSort(v, n)
            fim = time.time()
            media += fim-inicio
        print(str(n) + " " + str(media/100))
        n+=100

def piorCaso():
    n=100
    while(n<=1000):
        media = 0
        for i in range(0, 100):
            v = []
            v = arrayDescrescente(v, n)
            inicio = time.time()
            v = insertionSort(v, n)
            fim = time.time()
            media += fim-inicio
        print(str(n) + " " + str(media/100))
        n+=100

#descomente a linha do caso que deseja utilizar

#melhorCaso()
#medioCaso()
piorCaso()