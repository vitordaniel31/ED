import random
import time

# caso o python nao aceite o tamanho da recursividade
# descomente as proximas duas linhas:
#import sys 
#sys.setrecursionlimit(5000)

def arrayRandom(v, n):
    for i in range(0,n):
    	v.append(random.randint(0, 1001));
    return v

def arrayOrdenado(v, n):
    for i in range(0,n):
    	v.append(i);
    return v

def quickSort(v, s, e):
	if(s<e):
		p = partition(v, s, e)
		v = quickSort(v, s, p-1)
		v = quickSort(v, p+1, e)

	return v

def partition(v, s, e):
	
	# para uma versao de melhor caso
    # descomente a proximas linha:
	#v[(s+e)//2], v[e] = v[e], v[(s+e)//2]
	
	k = v[e]
	i = s-1
	for j in range(s, e):
		if(v[j]<=k):
			i+=1
			v[i], v[j] = v[j], v[i]

	v[i+1], v[e] = v[e], v[i+1]

	return i+1

def melhorCaso():
	n=100
	while(n<=1000):
		media = 0
		for i in range(0, 1000):
			v = []
			v = arrayOrdenado(v, n)
			inicio = time.time()
			v = quickSort(v, 0, n-1)
			fim = time.time()
			media += fim - inicio
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
			v = quickSort(v, 0, n-1)
			fim = time.time()
			media += fim - inicio
		print(str(n) + " " + str(media/100))
		n+=100

def piorCaso():
	n=100
	while(n<=1000):
		media = 0
		for i in range(0, 1000):
			v = []
			v = arrayOrdenado(v, n)
			inicio = time.time()
			v = quickSort(v, 0, n-1)
			fim = time.time()
			media += fim - inicio
		print(str(n) + " " + str(media/1000))
		n+=100

#melhorCaso()
#medioCaso()
piorCaso()

