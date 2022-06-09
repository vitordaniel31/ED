import random
import time

def arrayRandom(v, n):
    for i in range(0,n):
    	v.append(random.randint(0, 1001));
    return v

def mergeSort(v, s, e):
	if(s<e):
		m = (s+e)//2
		v = mergeSort(v, s, m) #v, 0, 1
		v = mergeSort(v, m+1, e) #v,1
		v = merge(v, s, m, e)
	return v

def merge(v, s, m, e):
	i = s
	j = m+1
	w = []
	
	for k in range(0, e-s+1):
		if(j>e or (i<=m and v[i]<v[j])):
			w.append(v[i])
			i+=1
		else:
			w.append(v[j])
			j+=1
	
	for k in range(0, e-s+1):
		v[s+k] = w[k]

	return v

def tempo():
	v = []
	n=100
	while(n<=1000):
		media = 0
		for i in range(0, 100):
			v = arrayRandom(v, n)
			inicio = time.time()
			v = mergeSort(v, 0, n-1)
			fim = time.time()
			media += fim - inicio
		print(str(n) + " " + str(media/100))
		n+=100

tempo()