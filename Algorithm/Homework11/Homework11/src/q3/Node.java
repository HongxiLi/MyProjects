package q3;

import javafx.util.Pair;

import java.util.ArrayList;

/**
 * @author: Hongxi Li
 * @ID: 001893090
 * @Date: 2019-04-12 16:39
 */
 class Node {
    private String name;

    private ArrayList<Pair<Node, Integer>> connections = new ArrayList<>();

    Node(String name) {
        this.name = name;
    }

    ArrayList<Pair<Node, Integer>> getConnections() {
        return connections;
    }

    void addNode(Node node, int weight) {
        connections.add(new Pair<>(node, weight));
    }

    String getName() {
        return name;
    }
}
