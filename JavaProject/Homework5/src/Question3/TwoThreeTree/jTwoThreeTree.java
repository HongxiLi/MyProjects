package Question3.TwoThreeTree;

import java.util.*;

/**
 * @author: Hongxi Li
 * @ID: 001893090
 * @Date: 2/15/19 11:11 PM
 */
public class jTwoThreeTree<T extends Comparable<T>>{
    private class Node{
        Node parent; //没办法，发现后面维护的时候需要向上递归
        //存放值
        Object[] data_K;
        //存放该节点子节点的引用
        Object[] node_A;

        public Node(int k, int a, T data, Node parent){
            data_K =  new Object[k];
            node_A =  new Object[a];
            data_K[0] = data;
            this.parent = parent;
        }
        public Node(int k, int a, Node parent){
            data_K =  new Object[k];
            node_A =  new Object[a];
            this.parent = parent;
        }
        public String toString(){
            if(data_K != null){
                StringBuilder sb = new StringBuilder("[");
                for(Object k : data_K){
                    sb.append(k.toString()+",");
                }
                return sb.toString().substring(0, sb.length() - 1) + "]";
            }else{
                return "[]";
            }
        }
    }
    //根节点
    private Node root;

    public jTwoThreeTree(){
        root = null;
    }
    public jTwoThreeTree(T data){
        root = new Node(1, 2, data, null);
    }

    /**
     * 插入元素data
     * @param data
     */
    @SuppressWarnings("unchecked")
    public void add(T data){
        if(root == null){
            root = new Node(1, 2, data, null);
        }else{
            //找相关节点
            Node current = root;
            Node parent = current;
            T maxtmp = null,mintmp = null;
            while(current != null){
                if(current.data_K.length == 1){ //如果是2-Node
                    maxtmp = mintmp = (T)current.data_K[0];
                }else{ //否则是3-Node
                    int result = ((T)current.data_K[0]).compareTo((T)current.data_K[1]);
                    if(result > 0 ){
                        maxtmp = (T)current.data_K[0];
                        mintmp = (T)current.data_K[1];
                    }else if(result < 0){
                        maxtmp = (T)current.data_K[1];
                        mintmp = (T)current.data_K[0];
                    }
                }
                //分出最大值和最小值后，
                if(data.compareTo(mintmp) == 0 || data.compareTo(maxtmp) == 0){
                    return; //如果树中已经存在要插入的数据，则返回
                }
                if(maxtmp == mintmp){ //2-node
                    parent = current;
                    if(data.compareTo(maxtmp) > 0){
                        current = (Node) current.node_A[1];
                    }else if(data.compareTo(maxtmp) < 0){
                        current = (Node)current.node_A[0];
                    }
                }else{ //3-node
                    parent = current;
                    if(data.compareTo(maxtmp) > 0){
                        current = (Node)current.node_A[2];
                    }else if(data.compareTo(mintmp) > 0){
                        current = (Node)current.node_A[1];
                    }else{
                        current = (Node)current.node_A[0];
                    }
                }
            }
            //找到了parent,也就是跟要添加数据最直接相关的节点
            //再进行一次比较和判断
            if(parent != null && maxtmp == mintmp && maxtmp != null){
                //把data和node两个数组都加一
                parent.data_K = Arrays.copyOf(parent.data_K, parent.data_K.length + 1);
                parent.node_A = Arrays.copyOf(parent.node_A, parent.node_A.length + 1);
                //把data值加入data数组
                parent.data_K[1] = data;
                //下面是确保3-Node中的左key 小于 右key
                swap(parent, 0, 1);

            }else if(parent != null && maxtmp != mintmp && maxtmp != null){
                fixForAdd(parent.parent, parent, data);
            }
        }
    }

    /**
     * 在3-Node节点时添加节点对树的维护
     * @param parent:你想知道原因
     * @param node:你真的想知道原因
     * @param data:就不告诉你
     */
    @SuppressWarnings("unchecked")
    private void fixForAdd(Node parent, Node node, T data) {
        if(root == node && node.data_K.length == 2){ //node==3-Node && node==root
            if(data.compareTo((T)node.data_K[0]) < 0){
                root = new Node(1, 2, (T)node.data_K[0], null);
                root.node_A[0] = new Node(1, 2, data, root);
                root.node_A[1] = new Node(1, 2, (T)node.data_K[1], root);
            }else if(data.compareTo((T)node.data_K[1]) > 0){
                root = new Node(1, 2, (T)node.data_K[1], null);
                root.node_A[0] = new Node(1, 2, (T)node.data_K[0], root);
                root.node_A[1] = new Node(1, 2, data, root);
            }else{
                root = new Node(1, 2, data, null);
                root.node_A[0] = new Node(1, 2, (T)node.data_K[0], root);
                root.node_A[1] = new Node(1, 2, (T)node.data_K[1], root);
            }
            return;
        }
		/*if(node.data_K.length == 2 && parent != null && parent.data_K.length == 1){//node==3-Node && parent==2-Node

		}*/
        if(node.data_K.length == 2){
            Node n_4Node = create4_Node(node, data);
            Node current = n_4Node;
            while(current != null && current.data_K.length == 3){
                current = split(current, current.parent);
            }
        }

    }

    /**
     * 由3-Node创建新的4-Node,当然还有一种方法就是将3-Node拓展成4-Node
     * @param node_3：3-Node
     * @param data：某数据
     * @return:返回新建的4-Node
     */
    private Node create4_Node(Node node_3, T data){
        if(node_3 != null && node_3.data_K.length == 2){ //如果node_3是3-Node把他变成4-Node
            Node node_4 = new Node(3, 4, node_3.parent); //新创建的4-Node指回了去
            node_4.data_K[0] = node_3.data_K[0];
            node_4.data_K[1] = node_3.data_K[1];
            node_4.data_K[2] = data;
            swap(node_4, 0, 1);
            swap(node_4, 0, 2);
            swap(node_4, 1, 2);

            finalDealForSplit(node_4, node_3);
            return node_4;
        }
        return null;
    }
    /**
     * 分离 node_4为2个node_2
     * @param node_4
     */
    @SuppressWarnings("unchecked")
    private Node split(Node node_4, Node parent){
        if(node_4 != null){
            if(root == node_4 && node_4.data_K.length == 3){//本身是4-Node，且是根
                root = new Node(1, 2, (T)node_4.data_K[1], null);
                Node l_tmp = new Node(1, 2, (T)node_4.data_K[0], root);
                Node r_tmp = new Node(1, 2, (T)node_4.data_K[2], root);
                l_tmp.node_A[0] = node_4.node_A[0];
                l_tmp.node_A[1] = node_4.node_A[1];
                if( node_4.node_A[0] != null){
                    Node t0 = (Node)node_4.node_A[0];
                    t0.parent = l_tmp;
                }
                if( node_4.node_A[1] != null){
                    Node t1 = (Node)node_4.node_A[1];
                    t1.parent = l_tmp;
                }
                r_tmp.node_A[0] = node_4.node_A[2];
                r_tmp.node_A[1] = node_4.node_A[3];
                if( node_4.node_A[2] != null){
                    Node t2 = (Node)node_4.node_A[2];
                    t2.parent = r_tmp;
                }
                if( node_4.node_A[3] != null){
                    Node t3 = (Node)node_4.node_A[3];
                    t3.parent = r_tmp;
                }

                root.node_A[0] = l_tmp;
                root.node_A[1] = r_tmp;

                return root;
            }else if(node_4.data_K.length == 3 && parent.data_K.length == 1){//本身是4-Node，父节点是2-Node

                Node p = new Node(2, 3, parent.parent);
                Node s1 = new Node(1, 2, p);
                Node s2 = new Node(1, 2, p);

                p.data_K[0] = node_4.data_K[1];
                p.data_K[1] = parent.data_K[0];

                swap(p, 0, 1);

                if(node_4 == parent.node_A[0]){ //左
                    p.node_A[2] = parent.node_A[1];
                    if(parent.node_A[1] != null){
                        Node t = (Node)parent.node_A[1];
                        t.parent = p;
                    }

                    s1_S2(s1, s2, node_4, p);

                    p.node_A[0] = s1;
                    p.node_A[1] = s2;

                }else if(node_4 == parent.node_A[1]){//右
                    p.node_A[0] = parent.node_A[0];
                    if(parent.node_A[0] != null){
                        Node t = (Node)parent.node_A[0];
                        t.parent = p;
                    }

                    s1_S2(s1, s2, node_4, p);

                    p.node_A[1] = s1;
                    p.node_A[2] = s2;
                }

                finalDealForSplit(p, parent);
                if(p.parent == null){
                    root = p;
                }
                return p;

            }else if(node_4.data_K.length == 3 && parent.data_K.length == 2){//本身是4-Node，父节点是3-Node
                Node p = new Node(3, 4, parent.parent);
                Node s1 = new Node(1, 2, p);
                Node s2 = new Node(1, 2, p);
                p.data_K[0] = node_4.data_K[1];
                p.data_K[1] = parent.data_K[0];
                p.data_K[2] = parent.data_K[1];
                //如果上面（316-318）的代码写在判断里面，下面的swap可以不写，总之是为了p中的三个数据有小到大存储
                swap(p, 0, 1);
                swap(p, 0, 2);
                swap(p, 1, 2);

                if(node_4 == parent.node_A[0]){//左
                    p.node_A[2] = parent.node_A[1];
                    p.node_A[3] = parent.node_A[2];
                    if(parent.node_A[1] != null){
                        Node t3 = (Node)parent.node_A[1];
                        t3.parent = p;
                    }
                    if(parent.node_A[2] != null){
                        Node t2 = (Node)parent.node_A[2];
                        t2.parent = p;
                    }

                    s1_S2(s1, s2, node_4, p);

                    p.node_A[0] = s1;
                    p.node_A[1] = s2;
                }else if(node_4 == parent.node_A[1]){ //中
                    p.node_A[0] = parent.node_A[0];
                    p.node_A[3] = parent.node_A[2];
                    if(parent.node_A[0] != null){
                        Node t0 = (Node)parent.node_A[0];
                        t0.parent = p;
                    }
                    if(parent.node_A[2] != null){
                        Node t2 = (Node)parent.node_A[2];
                        t2.parent = p;
                    }

                    s1_S2(s1, s2, node_4, p);

                    p.node_A[1] = s1;
                    p.node_A[2] = s2;
                }else if(node_4 == parent.node_A[2]){ //右
                    p.node_A[0] = parent.node_A[0];
                    p.node_A[1] = parent.node_A[1];
                    if(parent.node_A[0] != null){
                        Node t0 = (Node)parent.node_A[2];
                        t0.parent = p;
                    }
                    if(parent.node_A[1] != null){
                        Node t1 = (Node)parent.node_A[1];
                        t1.parent = p;
                    }

                    s1_S2(s1, s2, node_4, p);

                    p.node_A[2] = s1;
                    p.node_A[3] = s2;
                }
                finalDealForSplit(p, parent);
                if(p.parent == null){
                    root = p;
                }
                return p;
            }
        }
        return null;
    }
    //
    @SuppressWarnings("unchecked")
    private void s1_S2(Node s1, Node s2, Node node_4,Node p){
        s1.data_K[0] = node_4.data_K[0];
        s1.node_A[0] = node_4.node_A[0];
        s1.node_A[1] = node_4.node_A[1];
        if(node_4.node_A[0] != null){
            Node n1 = (Node)node_4.node_A[0];
            n1.parent = s1;
        }
        if(node_4.node_A[1] != null){
            Node n2 = (Node)node_4.node_A[1];
            n2.parent = s1;
        }
        s2.data_K[0] = node_4.data_K[2];
        s2.node_A[0] = node_4.node_A[2];
        s2.node_A[1] = node_4.node_A[3];
        if(node_4.node_A[2] != null){
            Node n3 = (Node)node_4.node_A[2];
            n3.parent = s2;
        }
        if(node_4.node_A[3] != null){
            Node n4 = (Node)node_4.node_A[3];
            n4.parent = s2;
        }
    }
    //
    private void finalDealForSplit(Node p, Node parent){
        if(root == parent){
            root = p;
        }else{
            Node pp = parent.parent;
            for(int i = 0; pp != null && i < pp.node_A.length; i ++){
                if(pp.node_A[i] == parent){
                    pp.node_A[i] = p;
                    break;
                }
            }
        }
    }
    /*@SuppressWarnings("unchecked")
    private boolean isHave(Node node, T data){
        if(node != null){
            for(int i = 0; i < node.data_K.length; i ++){
                if(data.compareTo((T)node.data_K[i]) == 0){
                    return true;
                }else{
                    continue;
                }
            }
        }
        return false;
    }*/
    //如果t1 > t2,则交换t1和t2
    @SuppressWarnings("unchecked")
    private void swap(Node node, int t1, int t2){
        if(node != null && node.data_K.length > t2){
            if(((T)node.data_K[t1]).compareTo((T)node.data_K[t2]) > 0){
                T t = (T)node.data_K[t1];
                node.data_K[t1] = node.data_K[t2];
                node.data_K[t2] = t;
            }
        }
    }
    /**
     * 查找
     * @param data
     * @return
     */
    @SuppressWarnings("unchecked")
    public Msg search(T data){
        if(root == null){
            new Exception("2-3树为空，查你妹╮(╯_╰)╭");
        }
        else{
            int height = 1;
            Node current = root;
            while(current != null){
                //因为2-3树中只会存在2-Node和3-Node两种节点
                if(current.data_K.length == 1){ //当前节点是2-Node
                    if(data.compareTo((T)current.data_K[0]) < 0){
                        current = (Node) current.node_A[0];
                    }else if(data.compareTo((T)current.data_K[0]) > 0){
                        current = (Node) current.node_A[1];
                    }else{
                        return new Msg(current, height);
                    }
                }
                else if(current.data_K.length == 2){//当前节点是3-Node
                    if(data.compareTo((T)current.data_K[0]) == 0 || data.compareTo((T)current.data_K[1]) == 0){
                        return new Msg(current, height);
                    }
                    if(data.compareTo((T)current.data_K[0]) < 0 ){
                        current = (Node)current.node_A[0];
                    }else if(data.compareTo((T)current.data_K[1]) > 0){
                        current = (Node)current.node_A[2];
                    }else{
                        current = (Node)current.node_A[1];
                    }
                }
                height ++;
            }
        }
        return null;
    }
    /**
     * 删除
     * @param data
     * @return
     */
    public String delete(T data){
        if(root == null){
            new Exception("2-3树为空，删你妹╮(╯_╰)╭");
        }else{
            //waiting.....
			/*找到要删除元素的节点node，应该很快。
			没有就return　＂找不到指定的数据元素之类的话＂;
			有就接着下一步：
				找到该元素node的后继节点succ，然后把node节点的
				值替换成后继节点succ节点的最小的值。最后把后继节点
				从树中剔除掉，完事。*/
            return "删除成功";
        }
        return "删除失败";
    }
    //广度优先遍历
    public List<Node> breadthFirstSearch(){
        return cBreadthFirstSearch(root);
    }
    @SuppressWarnings("unchecked")
    private List<Node> cBreadthFirstSearch(Node node) {
        List<Node> nodes = new ArrayList<Node>();
        Deque<Node> deque = new ArrayDeque<Node>();
        if(node != null){
            deque.offer(node);
        }
        while(!deque.isEmpty()){
            Node n = deque.poll();
            nodes.add(n);
            for(int i = 0; i < n.node_A.length; i ++){
                if(n.node_A[i] != null){
                    deque.offer((Node)n.node_A[i]);
                }
            }
        }
        return nodes;
    }
    public static void main(String[] args) {
        jTwoThreeTree<Integer> tree = new jTwoThreeTree<Integer>();

        tree.add(3);
        System.out.println(tree.breadthFirstSearch());
        tree.add(7);
        System.out.println(tree.breadthFirstSearch());
        tree.add(9);
        System.out.println(tree.breadthFirstSearch());
        tree.add(23);
        System.out.println(tree.breadthFirstSearch());
        tree.add(45);
        System.out.println(tree.breadthFirstSearch());
        tree.add(1);
        System.out.println(tree.breadthFirstSearch());
        tree.add(5);
        System.out.println(tree.breadthFirstSearch());
        tree.add(14);
        System.out.println(tree.breadthFirstSearch());
        tree.add(55);
        System.out.println(tree.breadthFirstSearch());
        tree.add(24);
        System.out.println(tree.breadthFirstSearch());
        tree.add(13);
        System.out.println(tree.breadthFirstSearch());
        tree.add(11);
        System.out.println(tree.breadthFirstSearch());
        tree.add(8);
        System.out.println(tree.breadthFirstSearch());
        tree.add(19);
        System.out.println(tree.breadthFirstSearch());
        tree.add(4);
        System.out.println(tree.breadthFirstSearch());
        tree.add(31);
        System.out.println(tree.breadthFirstSearch());
        tree.add(35);
        System.out.println(tree.breadthFirstSearch());
        tree.add(56);
        System.out.println(tree.breadthFirstSearch());

//        tree.add(12);
//        tree.add(10);
//        System.out.println(tree.breadthFirstSearch());
//        tree.add(11);
//        System.out.println(tree.breadthFirstSearch());
//        tree.add(14);
//        System.out.println(tree.breadthFirstSearch());
//        tree.add(16);
//        System.out.println(tree.breadthFirstSearch());
//        tree.add(18);
//        System.out.println(tree.breadthFirstSearch());
//        tree.add(20);
//        System.out.println(tree.breadthFirstSearch());
        for(int i = 3239200; i > 0; i --){
            tree.add(i);
        }
        System.out.println("That is all!");
        //System.out.println(tree.breadthFirstSearch());
        System.out.println("45 is"+tree.search(45));
    }

    private class Msg{
        private Node node;
        private int height;
        public Msg(Node node, int height){
            this.node = node;
            this.height = height;
        }
        public String toString(){
            return "The"+height+"th Level："+node.toString();
        }
    }
}
