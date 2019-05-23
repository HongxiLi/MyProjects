package q3;

import java.util.ArrayList;

/**
 * @author: Hongxi Li
 * @ID: 001893090
 * @Date: 2019-04-12 16:39
 */
public class Chromosome {
    private ArrayList<Node> nodes;
    private int distance;

    Chromosome() {
        nodes = new ArrayList<>();
    }

    ArrayList<Node> getNodes() {
        return nodes;
    }

    int getDistance() {
        return distance;
    }

    void setDistance(int distance) {
        this.distance = distance;
    }

    void addNode(Node node) {
        nodes.add(node);
    }

    @Override
    public String toString() {
        StringBuilder nodesString = new StringBuilder();

        for (int i = 0; i < nodes.size(); i++) {
            nodesString.append(nodes.get(i).getName());
            if (i != nodes.size() - 1)
                nodesString.append('-');
        }
        return distance + " " + nodesString.toString();
    }
}
