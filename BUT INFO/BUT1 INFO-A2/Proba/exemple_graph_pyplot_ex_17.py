import numpy as np
import matplotlib.pyplot as plt

x=np.arange(1,6)
y=(1/10)*(3-x)**2

z=[sum(y[:i+1]) for i in range(y.size)]

f,(ax1,ax2)=plt.subplots(1,2)
ax1.bar(x,y)
amplitude=1

x_frep=np.copy(x)
x_frep=np.insert(x_frep,0,x_frep[0]-amplitude)
z=np.insert(z,0,0)
x_frep=np.insert(x_frep,len(x_frep),x_frep[-1]+amplitude)
z=np.insert(z,len(z),1)

for i in range(x_frep.size-1):
    ax2.plot([x_frep[i],x_frep[i+1]],[z[i],z[i]],'b')
plt.show()

esperance=np.average(x,weights=y)
print("esperance=",esperance)
variance=np.average((x-esperance)**2,weights=y)
print("variance=",variance)
ecart_type=variance**(1/2)
print("ecart type=",ecart_type)
