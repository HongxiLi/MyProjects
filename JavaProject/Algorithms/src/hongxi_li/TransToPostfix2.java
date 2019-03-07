package hongxi_li;
/**
 * @author: Hongxi Li
 * @id: 001893090
 * @Date: 4:01:14 PM
 */


import java.util.Scanner;

public class TransToPostfix2 {
	
	//youdian wenti
	public static void main(String[] args) {
		Scanner sc = new Scanner(System.in);
		char[] input = sc.nextLine().toCharArray();
		char[] operator = new char[input.length];		//运算符栈
		char[] result = new char[input.length];			//用来保存后缀结果
		int ir = 0,io = 0;					//ir为result下标，表示存储下一个元素待插入的位置；io为operator下包，同ir
		
		for (int i=0;i<input.length;i++){	//遍历每一个字符
			char c = input[i];
			
			if (c >= '0' && c <= '9')		//c如果是数字，则直接放到result中
				result[ir++] = c;
			else if (c == '(')				//'('直接放到operateor中			
					operator[io++] = c;		
			else if (c == ')'){				//如果c是')'，则把上一个'('和c之间的所有运算符都放到result中，最后io指向待插入位置的下标
				while (operator[io] != '(')
					result[ir++] = operator[io--];
			} else if(io == 0)				//c为+-*/时，io为0，直接把c放到operator中
				operator[io++] = c;
			else {						//c为+-*/时，io不为0。注意：( ) * + - /的ASCII码分别为40 41 42 43 45 47
				if (operator[io-1]=='(')	//如果operator[io-1]为'('，优先级最低，直接放到operator中
					operator[io] = c;
				else{					//c不为'('，则为+-*/，比较c与上一个运算符的优先级。+-为0，*/为1
					int	priorityPre = operator[io-1]==42 || operator[io-1]==47 ? 1 : 0;		//获取上一个运算符的优先级
					int priorityCur = c==42 || c==47 ? 1 : 0;					//获取c的优先级
					if (priorityCur <= priorityPre){						//比上一个优先级低，上一个出栈，c保留
						result[ir++] = operator[io-1];									
						operator[io-1] = c;
					}else										//比上一个优先级高，c直接保留
						operator[io++] = c;
				}
			}
		}
		
		while (io > 0)						//将operator中剩下的运算符按出栈顺序保存到result中
			result[ir++] = operator[--io];
		
		for (int i=0;i<input.length;++i)			//打印结果
			System.out.print(result[i]);
	}

}
