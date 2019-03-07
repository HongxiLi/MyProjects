package hongxi_li;
import java.util.LinkedList;
import java.util.Stack;

/**
 * @author: Hongxi Li
 * @id: 001893090
 * @Date: 10:36:32 PM
 */

public class Tree {
	private BinaryTreeNode root;
 
	// 递归中序遍历
	public void inOrder(BinaryTreeNode node) {
		if (node != null) {
			inOrder(node.llink);
			System.out.print(node.info);
			inOrder(node.rlink);
		}
	}
 
	// 非递归中序遍历
	public void nonRecursiveInOrder() {
		Stack<BinaryTreeNode> stack = new Stack<BinaryTreeNode>();
		BinaryTreeNode node;
		node = root;
		while ((node != null) || (!stack.empty())) {
			if (node != null) {
				stack.push(node);
				node = node.llink;
			} else {
				node = stack.peek();
				stack.pop();
				System.out.print(node.info);
				node = node.rlink;
			}
		}
	}
 
	// 递归前序遍历
	public void preOrder(BinaryTreeNode node) {
		if (node != null) {
			System.out.print(node.info);
			preOrder(node.llink);
			preOrder(node.rlink);
		}
	}
 
	// 非递归前序遍历
	public void nonRecursivePreOrder() {
		Stack<BinaryTreeNode> stack = new Stack<BinaryTreeNode>();
		BinaryTreeNode node;
		node = root;
		while ((node != null) || (!stack.isEmpty())) {
			if (node != null) {
				System.out.print(node.info);
				stack.push(node);
				node = node.llink;
			} else {
				node = stack.peek();
				stack.pop();
				node = node.rlink;
			}
		}
	}
 
	// 递归后序遍历
	public void postOrder(BinaryTreeNode node) {
		if (node != null) {
			postOrder(node.llink);
			postOrder(node.rlink);
			System.out.print(node.info);
		}
	}
 
	// 非递归后序遍历
	public void notRecursivePostOrder() {
		Stack<BinaryTreeNode> stack = new Stack<BinaryTreeNode>();
		BinaryTreeNode node;
		node = root;
		while ((node != null) || (!stack.isEmpty())) {
			if (node != null) {
				node.isFirst = true;
				stack.push(node);
				node = node.llink;
			} else {
				node = stack.peek();
				stack.pop();
				if (node.isFirst) {
					node.isFirst = false;
					stack.push(node);
					node = node.rlink;
				} else {
					System.out.print(node.info);
					node = null;
				}
			}
		}
	}
 
	// 树的层次遍历
	public void bfs() {
		LinkedList<BinaryTreeNode> queue = new LinkedList<BinaryTreeNode>();
		BinaryTreeNode node;
		node = root;
		while ((node != null) || (!queue.isEmpty())) {
			if (node != null) {
				System.out.print(node.info);
				queue.add(node.llink);
				queue.add(node.rlink);
				node = queue.poll();
			} else {
				node = queue.poll();
			}
		}
	}
 
	public class BinaryTreeNode {
		private BinaryTreeNode llink = null;
		private BinaryTreeNode rlink = null;
		private int info;
		private boolean isFirst;
 
		public BinaryTreeNode(int info) {
			this.info = info;
		}
	}
 
	public void initTree() {
		root = new BinaryTreeNode(1);
		root.llink = new BinaryTreeNode(2);
		root.rlink = new BinaryTreeNode(3);
		root.llink.llink = null;
		root.llink.rlink = new BinaryTreeNode(4);
	}
 
	public BinaryTreeNode getRoot() {
		return root;
	}
 
	public void setRoot(BinaryTreeNode root) {
		this.root = root;
	}
 
	public static void main(String[] args) {
		 Tree tree = new Tree();
		 tree.initTree();
		 tree.preOrder(tree.getRoot());
		 tree.nonRecursivePreOrder();
		 tree.inOrder(tree.getRoot());
		 tree.nonRecursiveInOrder();
		 tree.postOrder(tree.getRoot());
		 tree.notRecursivePostOrder();
		tree.bfs();
	}
}

